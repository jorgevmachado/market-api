/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     19/01/2019 11:46:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: FABRICANTE                                            */
/*==============================================================*/
CREATE TABLE STORE.FABRICANTE (
                                NU_FABRICANTE            NUMBER(10)
                                  GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                                NO_FABRICANTE            VARCHAR2(200 CHAR)  NOT NULL,
                                LK_FABRICANTE            VARCHAR2(128 CHAR) NOT NULL,
                                CONSTRAINT FABRICANTE_PK PRIMARY KEY (NU_FABRICANTE)
);

COMMENT ON TABLE STORE.FABRICANTE IS
'Tabela para armazenar os dados dp Fabricante.';

COMMENT ON COLUMN STORE.FABRICANTE.NU_FABRICANTE IS
'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.FABRICANTE.NO_FABRICANTE IS
'Nome do Fabricante.';

COMMENT ON COLUMN STORE.FABRICANTE.LK_FABRICANTE IS
'Site do Fabricante.';


/*==============================================================*/
/* Index: NOME_FABRICANTE_I                                   */
/*==============================================================*/
CREATE INDEX STORE.NOME_FABRICANTE_I ON STORE.FABRICANTE (
NO_FABRICANTE ASC
);

INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Kingston','www.kingston.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Seagate','www.seagate.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Corsair','www.corsair.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Olimpus','www.olimpus.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Samsung','www.samsung.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Sony','www.sony.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Creative','www.creative.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Intel','www.intel.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('HP','www.hp.com');
INSERT INTO STORE.FABRICANTE(NO_FABRICANTE,LK_FABRICANTE) VALUES('Satellite','www.satellite.com');
COMMIT;
