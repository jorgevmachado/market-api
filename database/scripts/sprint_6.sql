-- https://jira.machado.com.br/browse/ESICAM-877

ALTER TABLE SICAM.HISTORICO_OPERACAO MODIFY NO_COLUNA DEFAULT NULL NULL;

DROP TABLE SICAM.INCONSISTENCIA;
DROP TABLE SICAM.VERIFICACAO_INCONSIST_COLETA;
DROP TABLE SICAM.LOTACAO_ANUENCIA;


CREATE TABLE sicam.verificacao_inconsist_envio (
  nu_verificacao_inconsis_envio   NUMBER(10)
  GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE NOCACHE NOORDER )
                                             NOT NULL,
  nu_verificacao_inconsistencia   NUMBER(10) NOT NULL,
  nu_historico_envio              NUMBER(10) NOT NULL
);

COMMENT ON TABLE sicam.verificacao_inconsist_envio IS
  'Tabela para armazenar os hisoricos de envios de coletas analizados na verificação de inconsitência';

COMMENT ON COLUMN sicam.verificacao_inconsist_envio.nu_verificacao_inconsis_envio IS
  'Codigo chave da tabela, PK Identity identifica o registro unico';

COMMENT ON COLUMN sicam.verificacao_inconsist_envio.nu_verificacao_inconsistencia IS
  'FK da tabela de verificação de inconsistência';

COMMENT ON COLUMN sicam.verificacao_inconsist_envio.nu_historico_envio IS
  'FK da tabela de historicos de envio da coletas para determinar os envios utilizados em uma verificação de inconsistência';

ALTER TABLE sicam.verificacao_inconsist_envio
  ADD CONSTRAINT verificacao_inconsis_envio_pk PRIMARY KEY ( nu_verificacao_inconsis_envio );

ALTER TABLE sicam.verificacao_inconsist_envio
  ADD CONSTRAINT verifica_inconsist_envio__un UNIQUE ( nu_verificacao_inconsistencia, nu_historico_envio );

ALTER TABLE sicam.verificacao_inconsist_envio
  ADD CONSTRAINT verif_incons_hist_envi_cole_fk FOREIGN KEY ( nu_historico_envio )
REFERENCES sicam.historico_envio_coleta ( nu_historico_envio );

ALTER TABLE sicam.verificacao_inconsist_envio
  ADD CONSTRAINT verifi_inc_envio_verif_inc_fk FOREIGN KEY ( nu_verificacao_inconsistencia )
REFERENCES sicam.verificacao_inconsistencia ( nu_verificacao_inconsistencia );



CREATE TABLE sicam.inconsistencia_envio_mat_colet (
  nu_inconsist_cole_mater_cole    NUMBER(10)
  GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE NOCACHE NOORDER )
                                                               NOT NULL,
  nu_verificacao_inconsis_envio   NUMBER(10) NOT NULL,
  nu_material_coleta_envio        NUMBER(10) NOT NULL,
  nu_verificacao_inconsistencia   NUMBER(10) NOT NULL,
  fg_corrigido                    VARCHAR2(1 CHAR) DEFAULT '0' NOT NULL
);

ALTER TABLE sicam.inconsistencia_envio_mat_colet
  ADD CHECK ( fg_corrigido IN ('0','1') );

COMMENT ON TABLE sicam.inconsistencia_envio_mat_colet IS
  'Tabela para armazenar os vinculos com os tombos enviados que incorreram em inconsistência';

COMMENT ON COLUMN sicam.inconsistencia_envio_mat_colet.nu_inconsist_cole_mater_cole IS
  'Codigo chave da tabela, PK Identity identifica o registro unico';

COMMENT ON COLUMN sicam.inconsistencia_envio_mat_colet.nu_verificacao_inconsis_envio IS
  'FK da tabela de coletas incluídas na verificação de inconsistência';

COMMENT ON COLUMN sicam.inconsistencia_envio_mat_colet.nu_material_coleta_envio IS
  'FK da tabela de material_coleta_envio para definir o tombo que incorreu em inconsistência';

COMMENT ON COLUMN sicam.inconsistencia_envio_mat_colet.nu_verificacao_inconsistencia IS
  'FK da tabela de verificação';

COMMENT ON COLUMN sicam.inconsistencia_envio_mat_colet.fg_corrigido IS
  'Define se a inconsistência foi corrigida';

ALTER TABLE sicam.inconsistencia_envio_mat_colet
  ADD CONSTRAINT inconsisten_cole_mater_cole_pk PRIMARY KEY ( nu_inconsist_cole_mater_cole );

ALTER TABLE sicam.inconsistencia_envio_mat_colet
  ADD CONSTRAINT incons_cole_mat_cole_envio_fk FOREIGN KEY ( nu_verificacao_inconsis_envio )
REFERENCES sicam.verificacao_inconsist_envio ( nu_verificacao_inconsis_envio );

ALTER TABLE sicam.inconsistencia_envio_mat_colet
  ADD CONSTRAINT incons_cole_mat_cole_fk FOREIGN KEY ( nu_verificacao_inconsistencia )
REFERENCES sicam.verificacao_inconsistencia ( nu_verificacao_inconsistencia );

ALTER TABLE sicam.inconsistencia_envio_mat_colet
  ADD CONSTRAINT incons_cole_ver_incons_envi_fk FOREIGN KEY ( nu_material_coleta_envio )
REFERENCES sicam.material_coleta_envio ( nu_material_coleta_envio );


CREATE TABLE sicam.lotacao_anuencia_parecer (
    nu_lotacao_anuencia_parecer   NUMBER(10)
        GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE NOCACHE NOORDER )
    NOT NULL,
    tx_anuencia_parecer           VARCHAR2(4000 BYTE) NOT NULL,
    dt_anuencia_parecer           TIMESTAMP NOT NULL,
    nu_consolidacao_lotacao       NUMBER(10) NOT NULL,
    nu_matricula                  VARCHAR2(12 BYTE) NOT NULL,
    ti_lotacao_anuencia_parecer   VARCHAR2(1 CHAR) NOT NULL
);

ALTER TABLE sicam.lotacao_anuencia_parecer
    ADD CHECK ( ti_lotacao_anuencia_parecer IN ('A', 'P') );
    
COMMENT ON COLUMN sicam.lotacao_anuencia_parecer.nu_lotacao_anuencia_parecer IS
    'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN sicam.lotacao_anuencia_parecer.tx_anuencia_parecer IS
    'Texto da Anuência ou Parecer dados pelo agente consignatário ou seu substituto';

COMMENT ON COLUMN sicam.lotacao_anuencia_parecer.dt_anuencia_parecer IS
    'Data de geração do registro';

COMMENT ON COLUMN sicam.lotacao_anuencia_parecer.nu_consolidacao_lotacao IS
    'FK da tabela consolidacao_lotacao';

COMMENT ON COLUMN sicam.lotacao_anuencia_parecer.nu_matricula IS
    'Identificação da matricula do agente consignatário ou substituto responsável pela anuência';

COMMENT ON COLUMN sicam.lotacao_anuencia_parecer.ti_lotacao_anuencia_parecer IS
    'Define o tipo do registro, se é de Parecer ou Anuência (P->Parecer, A->Anuência)';

CREATE UNIQUE INDEX sicam.lotacao_anuencia_pk ON
    sicam.lotacao_anuencia_parecer (
        nu_lotacao_anuencia_parecer
    ASC );

ALTER TABLE sicam.lotacao_anuencia_parecer
    ADD CONSTRAINT lotacao_anuencia_parecer_pk PRIMARY KEY ( nu_lotacao_anuencia_parecer );

ALTER TABLE sicam.lotacao_anuencia_parecer
    ADD CONSTRAINT lot_anuen_cons_lot_fk FOREIGN KEY ( nu_consolidacao_lotacao )
        REFERENCES sicam.consolidacao_lotacao ( nu_consolidacao_lotacao );

-- fim ESICAM-877

-- https://jira.machado.com.br/browse/ESICAM-882
INSERT INTO SICAM.STATUS_CONSOLIDACAO (DE_STATUS_CONSOLIDACAO, TI_STATUS_CONSOLIDACAO) VALUES ('Pendente Parecer MC', 'L');
INSERT INTO SICAM.STATUS_CONSOLIDACAO (DE_STATUS_CONSOLIDACAO, TI_STATUS_CONSOLIDACAO) VALUES ('Parecer Favorável', 'L');
INSERT INTO SICAM.STATUS_CONSOLIDACAO (DE_STATUS_CONSOLIDACAO, TI_STATUS_CONSOLIDACAO) VALUES ('Parecer Não Favorável', 'L');


ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO
  DROP CONSTRAINT MEMBRO_AUX_CONSOLIDACAO_LOT_FK;

ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO RENAME COLUMN NU_MEMBRO_AUXILIAR_LOTACAO TO NU_VERIFICACAO_INCONSISTENCIA;
ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO ADD NU_MATRICULA VARCHAR2(12 char) NOT NULL;
ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO MODIFY NU_TERMO_CIENCIA DEFAULT null NULL;

COMMENT ON COLUMN SICAM.CONSOLIDACAO_LOTACAO.NU_VERIFICACAO_INCONSISTENCIA IS
    'Fk da tabela VERIFICACAO_INCONSISTENCIA. Para definir qual verificação gerou a consolidação';
COMMENT ON COLUMN SICAM.CONSOLIDACAO_LOTACAO.NU_MATRICULA IS
    'Armazena a matricula de quem realizou a consolidação da verificação de inconsistência';

ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO
    ADD CONSTRAINT CONS_LOT_VERIFICA_INCONSIST_FK FOREIGN KEY ( NU_VERIFICACAO_INCONSISTENCIA )
        REFERENCES SICAM.VERIFICACAO_INCONSISTENCIA ( NU_VERIFICACAO_INCONSISTENCIA );

DROP TABLE SICAM.CONSOLIDACAO_COLETA;

-- fim ESICAM-882