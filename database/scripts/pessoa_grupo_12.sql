/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     21/01/2019 23:26:05                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: PESSOA_GRUPO                                            */
/*==============================================================*/
CREATE TABLE STORE.PESSOA_GRUPO (
                            NU_PESSOA_GRUPO         NUMBER(10)
                            GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                            NU_PESSOA               NUMBER(10)    NOT NULL,
                            NU_GRUPO               NUMBER(10)    NOT NULL,
                            CONSTRAINT PESSOA_GRUPO_PK PRIMARY KEY (NU_PESSOA_GRUPO),
                            CONSTRAINT PESSOA_PESSOA_GRUPO_FK FOREIGN KEY (NU_PESSOA) REFERENCES STORE.PESSOA(NU_PESSOA),
                            CONSTRAINT GRUPO_PESSOA_GRUPO_FK FOREIGN KEY (NU_GRUPO) REFERENCES STORE.GRUPO(NU_GRUPO)
);

COMMENT ON TABLE STORE.PESSOA_GRUPO IS
  'Tabela para armazenar os dados da PESSOA_GRUPO.';

COMMENT ON COLUMN STORE.PESSOA_GRUPO.NU_PESSOA_GRUPO IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.PESSOA_GRUPO.NU_PESSOA    IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';
COMMENT ON COLUMN STORE.PESSOA_GRUPO.NU_GRUPO    IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

INSERT INTO STORE.PESSOA_GRUPO( NU_PESSOA, NU_GRUPO) VALUES(1,1);
INSERT INTO STORE.PESSOA_GRUPO( NU_PESSOA, NU_GRUPO) VALUES(1,3);
INSERT INTO STORE.PESSOA_GRUPO( NU_PESSOA, NU_GRUPO) VALUES(2,3);
INSERT INTO STORE.PESSOA_GRUPO( NU_PESSOA, NU_GRUPO) VALUES(2,4);
INSERT INTO STORE.PESSOA_GRUPO( NU_PESSOA, NU_GRUPO) VALUES(3,2);
INSERT INTO STORE.PESSOA_GRUPO( NU_PESSOA, NU_GRUPO) VALUES(3,4);
COMMIT;
