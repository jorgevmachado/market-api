/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     18/01/2019 21:05:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: ESTADO                                                */
/*==============================================================*/
CREATE TABLE STORE.ESTADO (
                            NU_ESTADO            NUMBER(10)
                              GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                            SG_ESTADO            VARCHAR2(2 CHAR)  NOT NULL,
                            NO_ESTADO            VARCHAR2(200 CHAR)  NOT NULL,
                            CONSTRAINT ESTADO_PK PRIMARY KEY (NU_ESTADO)
);

COMMENT ON TABLE STORE.ESTADO IS
'Tabela para armazenar os dados do Estado.';

COMMENT ON COLUMN STORE.ESTADO.NU_ESTADO IS
'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.ESTADO.SG_ESTADO IS
'Sigla do Estado.';

COMMENT ON COLUMN STORE.ESTADO.NO_ESTADO IS
'Nome do Estado.';


/*==============================================================*/
/* Index: SIGLA_ESTADO_I                                        */
/*==============================================================*/
CREATE INDEX STORE.SIGLA_ESTADO_I ON STORE.ESTADO (
SG_ESTADO ASC
);

INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AC','Acre');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AL','Alagoas');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AP','Amapá');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AM','Amazonas');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('BA','Bahia');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('CE','Ceará');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('DF','Distrito Federal');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('ES','Espírito Santo');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('GO','Goiás');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MA','Maranhão');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MT','Mato Grosso');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MS','Mato Grosso do Sul');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MG','Minas Gerais');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PA','Pará');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PB','Paraíba');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PR','Paraná');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PE','Pernambuco');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PI','Piauí');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RJ','Rio de Janeiro');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RN','Rio Grande do Norte');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RS','Rio Grande do Sul');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RO','Rondônia');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RR','Roraima');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('SC','Santa Catarina');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('SP','São Paulo');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('SE','Sergipe');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('TO','Tocantins');
COMMIT;
