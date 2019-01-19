/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     18/01/2019 21:05:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: CIDADE                                                */
/*==============================================================*/
CREATE TABLE STORE.CIDADE (
                            NU_CIDADE            NUMBER(10)
                              GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                            NO_CIDADE            VARCHAR2(200 CHAR)  NOT NULL,
                            NU_ESTADO            NUMBER(10) NOT NULL,
                            CONSTRAINT CIDADE_PK PRIMARY KEY (NU_CIDADE),
                            CONSTRAINT ESTADO_CIDADE_FK FOREIGN KEY (NU_ESTADO) REFERENCES STORE.ESTADO(NU_ESTADO)
);

COMMENT ON TABLE STORE.CIDADE IS
'Tabela para armazenar os dados da Cidade.';

COMMENT ON COLUMN STORE.CIDADE.NU_CIDADE IS
'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.CIDADE.NO_CIDADE IS
'Nome da cidade.';

COMMENT ON COLUMN STORE.CIDADE.NU_ESTADO IS
'Chave única da tabela FK, identifica o relascionamento do registro.';


/*==============================================================*/
/* Index: ESTADO_CIDADE_I                                   */
/*==============================================================*/
CREATE INDEX STORE.ESTADO_CIDADE_I ON STORE.CIDADE (
NU_ESTADO ASC
);

INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Aracajú',26);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Belém',14);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Belo Horizonte',13);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Boa Vista',23);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Brasília',7);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Campo Grande',12);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Cuiabá',11);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Curitiba',16);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Florianópolis',24);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Fortaleza',6);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Goiânia',9);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('João Pessoa',15);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Macap ',3);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Maceió',2);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Manaus',4);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Natal',20);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Palmas',27);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Porto Alegre',21);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Porto Velho',22);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Recife',17);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Rio Branco',1);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Rio de Janeiro',19);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Salvador',5);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('São Luis',10);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('São Paulo',25);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Teresina',18);
INSERT INTO STORE.CIDADE(NO_CIDADE,NU_ESTADO) VALUES('Vitória',8);
COMMIT;
