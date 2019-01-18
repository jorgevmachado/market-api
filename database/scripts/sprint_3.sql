-- SEM_TAREFA
CREATE TABLE sicam.membro_auxiliar_lotacao (
nu_membro_auxiliar_lotacao NUMBER(10)
GENERATED ALWAYS AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOMINVALUE NOMAXVALUE NOCYCLE CACHE 20 NOORDER )
NOT NULL,
nu_lotacao NUMBER(6) NOT NULL,
nu_membro_inventario NUMBER(10) NOT NULL
);

COMMENT ON TABLE sicam.membro_auxiliar_lotacao IS
'Tabela para armazenar as lotações em que os membros auxiliares estiverem vinculados durante o inventário';

COMMENT ON COLUMN sicam.membro_auxiliar_lotacao.nu_membro_auxiliar_lotacao IS
'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN sicam.membro_auxiliar_lotacao.nu_lotacao IS
'Define a lotação do membro auxiliar';

COMMENT ON COLUMN sicam.membro_auxiliar_lotacao.nu_membro_inventario IS
'Fk para determinar qual membro do inventario esta na lotação. Apenas registros do tipo Membro Auxiliar';

ALTER TABLE sicam.membro_auxiliar_lotacao
ADD CONSTRAINT membro_auxiliar_lotacao_pk PRIMARY KEY ( nu_membro_auxiliar_lotacao ) NOT DEFERRABLE ENABLE VALIDATE;

ALTER TABLE sicam.membro_auxiliar_lotacao
ADD CONSTRAINT membro_lotacao_lotacao_fk FOREIGN KEY ( nu_lotacao )
REFERENCES sarh.lotacao ( co_lotacao );

ALTER TABLE sicam.membro_auxiliar_lotacao
ADD CONSTRAINT memb_lot_mem_inventa_fk FOREIGN KEY ( nu_membro_inventario )
REFERENCES sicam.membro_inventario ( nu_membro_inventario );


ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO DROP COLUMN NU_MATRICULA;
ALTER TABLE SICAM.CONSOLIDACAO_LOTACAO ADD NU_MEMBRO_AUXILIAR_LOTACAO NUMBER NOT NULL;

ALTER TABLE sicam.consolidacao_lotacao
ADD CONSTRAINT cons_lot_mem_aux_lot_fk FOREIGN KEY ( nu_membro_auxiliar_lotacao )
REFERENCES sicam.membro_auxiliar_lotacao ( nu_membro_auxiliar_lotacao );

COMMENT ON COLUMN sicam.consolidacao_lotacao.nu_membro_auxiliar_lotacao IS
'Fk da tabela MEMBRO_AUXILIAR_LOTACAO. Para definir o membro que realiza a consolidação';

-- fim [SEM_TAREFA]


-- https://jira.machado.com.br/browse/ESICAM-492

ALTER TABLE SICAM.MEMBRO_AUXILIAR_LOTACAO ADD NU_MATRICULA VARCHAR2(12 CHAR) NOT NULL;
ALTER TABLE SICAM.MEMBRO_AUXILIAR_LOTACAO ADD FG_ATIVO VARCHAR2(1 BYTE) NOT NULL; 
ALTER TABLE SICAM.MEMBRO_AUXILIAR_LOTACAO ADD DT_ASSOCIACAO TIMESTAMP NOT NULL;
ALTER TABLE SICAM.MEMBRO_AUXILIAR_LOTACAO ADD DS_JUSTIFICATIVA VARCHAR2(2000);

COMMENT ON COLUMN SICAM.MEMBRO_AUXILIAR_LOTACAO.NU_MATRICULA IS 'Número da matrícula do responsável pela vinculação da lotação.';
COMMENT ON COLUMN SICAM.MEMBRO_AUXILIAR_LOTACAO.FG_ATIVO IS 'Inticativo de que o registro está ativo ou não (1 - ativo, 0 - inativo)'; 
COMMENT ON COLUMN SICAM.MEMBRO_AUXILIAR_LOTACAO.DS_JUSTIFICATIVA IS 'Justificativa das operações realizadas no registro'; 
COMMENT ON COLUMN SICAM.MEMBRO_AUXILIAR_LOTACAO.DT_ASSOCIACAO IS 'Data da associação do membro auxiliar com a lotação';
-- fim [ESICAM-492]

-- https://jira.machado.com.br/browse/ESICAM-476
ALTER TABLE SICAM.MEMBRO_INVENTARIO ADD DS_JUSTIFICATIVA VARCHAR2(2000);
ALTER TABLE SICAM.MEMBRO_INVENTARIO ADD TP_OPERACAO VARCHAR2(1);
COMMENT ON COLUMN SICAM.MEMBRO_INVENTARIO.DS_JUSTIFICATIVA IS 'Justificativa das operações realizadas no registro';
COMMENT ON COLUMN SICAM.MEMBRO_INVENTARIO.TP_OPERACAO IS 'Tipo da operação realizada no registro';

ALTER TABLE SICAM.INVENTARIO ADD FG_ABERTO VARCHAR(1) NOT NULL;
COMMENT ON COLUMN SICAM.INVENTARIO.FG_ABERTO IS 'Indicativo de que o registro está aberto ou não (1 - aberto, 0 - fechado)';

-- fim [ESICAM-476]