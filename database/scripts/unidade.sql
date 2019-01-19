/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     19/01/2019 13:52:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: UNIDADE                                            */
/*==============================================================*/
CREATE TABLE STORE.UNIDADE (
                             NU_UNIDADE            NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             SG_UNIDADE            VARCHAR2(5 CHAR)    NOT NULL,
                             NO_UNIDADE            VARCHAR2(200 CHAR)  NOT NULL,
                             CONSTRAINT UNIDADE_PK PRIMARY KEY (NU_UNIDADE)
);

COMMENT ON TABLE STORE.UNIDADE IS
'Tabela para armazenar os dados de Unidade.';

COMMENT ON COLUMN STORE.UNIDADE.NU_UNIDADE IS
'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.UNIDADE.SG_UNIDADE IS
'Nome da Unidade.';

COMMENT ON COLUMN STORE.UNIDADE.SG_UNIDADE IS
'Sigla da Unidade.';


/*==============================================================*/
/* Index: NOME_UNIDADE_I                                   */
/*==============================================================*/
CREATE INDEX STORE.NOME_UNIDADE_I ON STORE.UNIDADE (
SG_UNIDADE ASC
);

INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('cm', 'Centímetro');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('m',  'Metro');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('cm2','Centímetro quadrado');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('m2', 'Metro quadrado');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('cm3','Centímetro cúbico');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('m3', 'Metro cúbico');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('Kg', 'Kilograma');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('Gr', 'Grama');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('L',  'Litro');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('PC', 'Peça');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('PCT','Pacote');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('CX', 'Caixa');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('SAC','Saco');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('TON','Tonelada');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('KIT','Kit');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('GL', 'Galão');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('FD', 'Fardo');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('BL', 'Bloco');
COMMIT;