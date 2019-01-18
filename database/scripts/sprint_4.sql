
-- https://jira.machado.com.br/browse/ESICAM-542
ALTER TABLE SICAM.MATERIAL_COLETA ADD FG_MATRICULA_LEITOR_VALIDA VARCHAR2(1) NOT NULL;
COMMENT ON COLUMN SICAM.MATERIAL_COLETA.FG_MATRICULA_LEITOR_VALIDA IS 'Indicativo de que a matricula do leitor do bem é válida ou não no SARH (1 - válida, 0 - inválida).';
-- fim [ESICAM-542]


-- https://jira.machado.com.br/browse/ESICAM-550
ALTER TABLE SICAM.MEMBRO_AUXILIAR_LOTACAO ADD NU_MATRICULA_CANCELAMENTO VARCHAR2(12 CHAR) NULL;
COMMENT ON COLUMN SICAM.MEMBRO_AUXILIAR_LOTACAO.NU_MATRICULA_CANCELAMENTO IS 'Número da matrícula do responsável pelo cancelamento da lotação.';

ALTER TABLE SICAM.MEMBRO_AUXILIAR_LOTACAO ADD DT_CANCELAMENTO TIMESTAMP NULL;
COMMENT ON COLUMN SICAM.MEMBRO_AUXILIAR_LOTACAO.DT_CANCELAMENTO IS 'Data de Cancelamento da associação da lotação';
-- fim [ESICAM-550]

-- https://jira.machado.com.br/browse/ESICAM-548
ALTER TABLE SICAM.TIPO_PERIODO ADD FG_TIPO_PERIODO VARCHAR2(1) NOT NULL;
ALTER TABLE SICAM.TIPO_PERIODO ADD CONSTRAINT TIPO_PERIODO_FG_UNIQUE UNIQUE (FG_TIPO_PERIODO) ENABLE;
COMMENT ON COLUMN SICAM.TIPO_PERIODO.FG_TIPO_PERIODO IS 'Identifica o tipo do periodo atravez de uma letra não repetida';

INSERT INTO sicam.TIPO_PERIODO (DE_TIPO_PERIODO, FG_TIPO_PERIODO) VALUES ('Abrangência Geral', 'G');
INSERT INTO sicam.TIPO_PERIODO (DE_TIPO_PERIODO, FG_TIPO_PERIODO) VALUES ('Coleta', 'C');
INSERT INTO sicam.TIPO_PERIODO (DE_TIPO_PERIODO, FG_TIPO_PERIODO) VALUES ('Consolidação de Lotação', 'L');
INSERT INTO sicam.TIPO_PERIODO (DE_TIPO_PERIODO, FG_TIPO_PERIODO) VALUES ('Consolidação do TRF', 'T');
-- fim [ESICAM-548]

-- https://jira.machado.com.br/browse/ESICAM-553
ALTER TABLE SICAM.MEMBRO_INVENTARIO MODIFY TP_OPERACAO VARCHAR2(1) NULL;
-- FIM [ESICAM-553]


-- https://jira.machado.com.br/browse/ESICAM-557

ALTER TABLE SICAM.HISTORICO_ENVIO_COLETA ADD NU_STATUS_ATUAL_ENVIO NUMBER(10) NOT NULL;
ALTER TABLE SICAM.HISTORICO_ENVIO_COLETA ADD CONSTRAINT HIST_ENVIO_COL_STATUS_COL_fk
FOREIGN KEY (NU_STATUS_ATUAL_ENVIO) REFERENCES SICAM.STATUS_COLETA (NU_STATUS_COLETA);

ALTER TABLE SICAM.HISTORICO_ENVIO_COLETA DROP COLUMN DS_JUSTIFICATIVA;

-- INCLUSÃO DE CARGA INICIAL PARA A TABELA
INSERT INTO SICAM.STATUS_COLETA (DE_STATUS_COLETA) VALUES ('Invalidada para Consolidação');

CREATE TABLE sicam.historico_status_envio_coleta (
    nu_hist_status_envio_coleta   NUMBER(10)
        GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE CACHE 20 NOORDER )
    NOT NULL,
    nu_historico_envio            NUMBER(10) NOT NULL,
    nu_status_coleta              NUMBER(10) NOT NULL,
    nu_matricula                  VARCHAR2(12 CHAR) NOT NULL,
    dt_status                     TIMESTAMP NOT NULL,
    ds_justificativa              VARCHAR2(4000 CHAR) NOT NULL
);

COMMENT ON TABLE sicam.historico_status_envio_coleta IS
    'Tabela para armazenar o histório dos status dos envios das coletas a serem consolidadas';

COMMENT ON COLUMN sicam.historico_status_envio_coleta.nu_hist_status_envio_coleta IS
    'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN sicam.historico_status_envio_coleta.nu_historico_envio IS
    'Id do historico do envios FK da tabela HISTORICO_ENVIO_COLETA';

COMMENT ON COLUMN sicam.historico_status_envio_coleta.nu_matricula IS
    'Matricula do servidor responsável pela alteração do status API_SARH';

COMMENT ON COLUMN sicam.historico_status_envio_coleta.dt_status IS
    'Data de alteração do status';

COMMENT ON COLUMN sicam.historico_status_envio_coleta.ds_justificativa IS
    'Justificativa para a alteração do status do registro';

ALTER TABLE sicam.historico_status_envio_coleta
    ADD CONSTRAINT hist_status_envio_coleta_pk PRIMARY KEY ( nu_hist_status_envio_coleta );

ALTER TABLE sicam.historico_status_envio_coleta
    ADD CONSTRAINT hist_st_env_coleta_hist_env_fk FOREIGN KEY ( nu_historico_envio )
        REFERENCES sicam.historico_envio_coleta ( nu_historico_envio );

ALTER TABLE sicam.historico_status_envio_coleta
    ADD CONSTRAINT hist_st_env_coleta_st_col_fk FOREIGN KEY ( nu_status_coleta )
        REFERENCES sicam.status_coleta ( nu_status_coleta );

create or replace view SICAM.VW_HISTORICO_TRAMITE_COLETA as
  SELECT ROWNUM          as id,
         SH.NU_HISTORICO_COLETA_STATUS,
         SH.DT_STATUS    AS DT_HISTORICO,
         SH.NU_STATUS_COLETA,
         SH.NU_COLETA,
         SH.NU_MATRICULA,
         case
           when SH.NU_STATUS_COLETA = 2 then (select LISTAGG('(' || hsec.NU_MATRICULA || ' - ' ||
                                                             to_char(hsec.DT_STATUS, 'DD/MM/YYYY HH24:MM:SS') || ') ' ||
                                                             hsec.DS_JUSTIFICATIVA, '; ')
                                                         WITHIN GROUP (ORDER BY DT_STATUS desc)
                                              from SICAM.HISTORICO_ENVIO_COLETA C
                                                     join SICAM.HISTORICO_STATUS_ENVIO_COLETA hsec
                                                       on C.NU_HISTORICO_ENVIO = hsec.NU_HISTORICO_ENVIO
                                              where c.NU_COLETA = SH.nu_coleta
                                                and SH.DT_STATUS = c.DT_ENVIO)
           else null end as DS_JUSTIFICATIVA
  FROM sicam.Historico_Coleta_Status SH;

-- fim [ESICAM-557]






-- https://jira.machado.com.br/browse/ESICAM-598

create table SICAM.STATUS_MATERIAL_COLETA_ENVIO
(
       NU_STATUS_MATERIAL_COLETA NUMBER(10) GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE NOCACHE NOORDER )
                                                         NOT NULL,
       DE_STATUS_MATERIAL_COLETA VARCHAR2(100 char) not null
);

ALTER TABLE SICAM.STATUS_MATERIAL_COLETA_ENVIO
       ADD CONSTRAINT STATUS_MATERIAL_COLETA_ENVI_pk PRIMARY KEY ( NU_STATUS_MATERIAL_COLETA );

COMMENT ON TABLE SICAM.STATUS_MATERIAL_COLETA_ENVIO IS
       'Tabela para armazenar os status dos bens patrimoniais enviados para o MA';
COMMENT ON COLUMN SICAM.STATUS_MATERIAL_COLETA_ENVIO.NU_STATUS_MATERIAL_COLETA IS
       'Chave única da tabela PK, identity, identifica a unicidade do registro.';
COMMENT ON COLUMN SICAM.STATUS_MATERIAL_COLETA_ENVIO.DE_STATUS_MATERIAL_COLETA IS
       'Descritivo do status';


-- INCLUSÃO DE CARGA INICIAL PARA A TABELA
INSERT INTO SICAM.STATUS_MATERIAL_COLETA_ENVIO (DE_STATUS_MATERIAL_COLETA) VALUES ('Enviado');
INSERT INTO SICAM.STATUS_MATERIAL_COLETA_ENVIO (DE_STATUS_MATERIAL_COLETA) VALUES ('Excluído');
INSERT INTO SICAM.STATUS_MATERIAL_COLETA_ENVIO (DE_STATUS_MATERIAL_COLETA) VALUES ('Estado de Conservação Alterado');
INSERT INTO SICAM.STATUS_MATERIAL_COLETA_ENVIO (DE_STATUS_MATERIAL_COLETA) VALUES ('Inclusão de Imagem');


create table SICAM.HISTORICO_STATUS_MAT_COL_ENVIO
(
  NU_HISTORICO_STATU_MAT_COL NUMBER(10)
  GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE NOCACHE NOORDER )
                                                     NOT NULL,
  NU_MATERIAL_COLETA_ENVIO       NUMBER(10)          not null,
  NU_STATUS_MATERIAL_COLETA      NUMBER(10)          not null,
  NU_MATRICULA                   VARCHAR2(12 char)   not null,
  DT_STATUS                      TIMESTAMP(6)        not null,
  DS_JUSTIFICATIVA               VARCHAR2(4000 char) not null
);

ALTER TABLE SICAM.HISTORICO_STATUS_MAT_COL_ENVIO
  ADD CONSTRAINT HISTORICO_STA_MAT_COL_ENVIO_pk PRIMARY KEY ( NU_HISTORICO_STATU_MAT_COL );

ALTER TABLE SICAM.HISTORICO_STATUS_MAT_COL_ENVIO
  ADD CONSTRAINT HIST_ST_MA_CO_EN_MAT_COL_fk FOREIGN KEY ( NU_MATERIAL_COLETA_ENVIO )
REFERENCES sicam.MATERIAL_COLETA_ENVIO ( NU_MATERIAL_COLETA_ENVIO );

ALTER TABLE sicam.HISTORICO_STATUS_MAT_COL_ENVIO
  ADD CONSTRAINT HIST_ST_MA_CO_EN_MAT_COL_SM_fk FOREIGN KEY ( NU_STATUS_MATERIAL_COLETA )
REFERENCES SICAM.STATUS_MATERIAL_COLETA_ENVIO ( NU_STATUS_MATERIAL_COLETA );

COMMENT ON TABLE sicam.HISTORICO_STATUS_MAT_COL_ENVIO IS
  'Tabela para armazenar o histório dos status dos envios das coletas a serem consolidadas';

COMMENT ON COLUMN sicam.HISTORICO_STATUS_MAT_COL_ENVIO.NU_HISTORICO_STATU_MAT_COL IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN sicam.HISTORICO_STATUS_MAT_COL_ENVIO.NU_MATERIAL_COLETA_ENVIO IS
  'Id do historico do envios FK da tabela HISTORICO_ENVIO_COLETA';

COMMENT ON COLUMN sicam.HISTORICO_STATUS_MAT_COL_ENVIO.NU_STATUS_MATERIAL_COLETA IS
  'Id do status que gerou o histórico';

COMMENT ON COLUMN sicam.HISTORICO_STATUS_MAT_COL_ENVIO.nu_matricula IS
  'Matricula do servidor responsável pela alteração do status API_SARH';

COMMENT ON COLUMN sicam.HISTORICO_STATUS_MAT_COL_ENVIO.dt_status IS
  'Data de alteração do status';

COMMENT ON COLUMN sicam.HISTORICO_STATUS_MAT_COL_ENVIO.ds_justificativa IS
  'Justificativa para a alteração do status do registro';


ALTER TABLE SICAM.MATERIAL_COLETA_ENVIO ADD NU_STATUS_ATUAL_MATERIAL NUMBER(10) NOT NULL;
ALTER TABLE SICAM.MATERIAL_COLETA_ENVIO ADD CONSTRAINT MAT_COL_ENVIO_STATU_MAT_COL_fk
FOREIGN KEY (NU_STATUS_ATUAL_MATERIAL) REFERENCES SICAM.STATUS_MATERIAL_COLETA_ENVIO (NU_STATUS_MATERIAL_COLETA);
COMMENT ON COLUMN SICAM.MATERIAL_COLETA_ENVIO.NU_STATUS_ATUAL_MATERIAL IS
       'Define o status atual do material coleta enviado';

-- fim ESICAM-598





