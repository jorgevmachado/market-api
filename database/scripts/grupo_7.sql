/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     20/01/2019 22:43:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: GRUPO                                            */
/*==============================================================*/
CREATE TABLE STORE.GRUPO (
                             NU_GRUPO         NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             NO_GRUPO         VARCHAR2(200 CHAR)  NOT NULL,
                             CONSTRAINT GRUPO_PK PRIMARY KEY (NU_GRUPO)
);

COMMENT ON TABLE STORE.GRUPO IS
  'Tabela para armazenar os dados do GRUPO.';

COMMENT ON COLUMN STORE.GRUPO.NU_GRUPO IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.GRUPO.NO_GRUPO IS
  'Nome do GRUPO.';

/*==============================================================*/
/* Index: NOME_GRUPO_I                                   */
/*==============================================================*/
CREATE INDEX STORE.NOME_GRUPO_I ON STORE.GRUPO (
                                                         NO_GRUPO ASC
);
INSERT INTO STORE.GRUPO(NO_GRUPO) VALUES('Cliente');
INSERT INTO STORE.GRUPO(NO_GRUPO) VALUES('Fornecedor');
INSERT INTO STORE.GRUPO(NO_GRUPO) VALUES('Revendedor');
INSERT INTO STORE.GRUPO(NO_GRUPO) VALUES('Colaborador');
COMMIT;





