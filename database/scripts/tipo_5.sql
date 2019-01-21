/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     19/01/2019 19:49:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: TIPO                                            */
/*==============================================================*/
CREATE TABLE STORE.TIPO (
                          NU_TIPO            NUMBER(10)
                            GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                          NO_TIPO            VARCHAR2(200 CHAR)  NOT NULL,
                          CONSTRAINT TIPO_PK PRIMARY KEY (NU_TIPO)
);

COMMENT ON TABLE STORE.TIPO IS
'Tabela para armazenar os dados de Unidade.';

COMMENT ON COLUMN STORE.TIPO.NU_TIPO IS
'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.TIPO.NO_TIPO IS
'Nome do tipo de produto.';


/*==============================================================*/
/* Index: NOME_TIPO_I                                   */
/*==============================================================*/
CREATE INDEX STORE.NOME_TIPO_I ON STORE.TIPO (
NO_TIPO ASC
);


INSERT INTO STORE.TIPO(NO_TIPO) VALUES('Máquina');
INSERT INTO STORE.TIPO(NO_TIPO) VALUES('Acessório');
INSERT INTO STORE.TIPO(NO_TIPO) VALUES('Insumo');
INSERT INTO STORE.TIPO(NO_TIPO) VALUES('Componente');
INSERT INTO STORE.TIPO(NO_TIPO) VALUES('Suprimento');
COMMIT;