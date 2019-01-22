/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     21/01/2019 21:45:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: PESSOA                                            */
/*==============================================================*/
CREATE TABLE STORE.PESSOA (
                             NU_PESSOA         NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             NO_PESSOA         VARCHAR2(200 CHAR)  NOT NULL,
                             DS_ENDERECO       VARCHAR2(700 CHAR)  NOT NULL,
                             NO_BAIRRO         VARCHAR2(300 CHAR)  NOT NULL,
                             NU_TELEFONE       VARCHAR2(14 CHAR)   NOT NULL,
                             DS_EMAIL          VARCHAR2(64 CHAR)   NOT NULL,
                             NU_CIDADE         NUMBER(10)          NOT NULL,
                             CONSTRAINT PESSOA_PK PRIMARY KEY (NU_PESSOA),
                             CONSTRAINT CIDADE_PESSOA_FK FOREIGN KEY (NU_CIDADE) REFERENCES STORE.CIDADE(NU_CIDADE)
);

COMMENT ON TABLE STORE.PESSOA IS
  'Tabela para armazenar os dados da PESSOA.';

COMMENT ON COLUMN STORE.PESSOA.NU_PESSOA IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.PESSOA.NO_PESSOA IS
  'Nome da pessoa.';

COMMENT ON COLUMN STORE.PESSOA.DS_ENDERECO IS
  'Endereço da pessoa.';

COMMENT ON COLUMN STORE.PESSOA.NO_BAIRRO IS
  'Bairro da pessoa.';

COMMENT ON COLUMN STORE.PESSOA.NU_TELEFONE IS
  'Número de telefone da pessoa.';

COMMENT ON COLUMN STORE.PESSOA.DS_EMAIL IS
  'E-mail de contato da pessoa.';

COMMENT ON COLUMN STORE.PESSOA.NU_CIDADE IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

/*==============================================================*/
/* Index: NOME_PESSOA_I                                   */
/*==============================================================*/
CREATE INDEX STORE.NOME_PESSOA_I ON STORE.PESSOA (
                                                         NO_PESSOA ASC
);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Amadeu Weirich','Rua do Amadeu Weirich','Centro','(88) 1234-5678','naoenvie@email.com',18);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Andrigo Dametto','Rua do Andrigo Dametto','Centro','(88) 1234-5678','naoenvie@email.com',3);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Enio Silveira','Rua do Enio Silveira','Centro','(88) 1234-5678','naoenvie@email.com',19);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Ari Stopassola Junior','Rua do Ari Stopassola Junior','Centro','(88) 1234-5678','naoenvie@email.com',23);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Bruno Pitteli Gonçalves','Rua do Bruno Pitteli Gonçalves','Centro','(88) 1234-5678','naoenvie@email.com',26);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Carlos Eduardo Ranzi','Rua do Carlos Eduardo Ranzi','Centro','(88) 1234-5678','naoenvie@email.com',10);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Cesar Brod','Rua do Cesar Brod','Centro','(88) 1234-5678','naoenvie@email.com',4);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Edson Funke','Rua do Edson Funke','Centro','(88) 1234-5678','naoenvie@email.com',8);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Fabio Elias Locatelli','Rua do Fabio Elias Locatelli','Centro','(88) 1234-5678','naoenvie@email.com',25);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Fabrício Pretto','Rua do Fabrício Pretto','Centro','(88) 1234-5678','naoenvie@email.com',12);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Felipe Cortez','Rua do Felipe Cortez','Centro','(88) 1234-5678','naoenvie@email.com',1);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('João Pablo Silva','Rua do João Pablo Silva','Centro','(88) 1234-5678','naoenvie@email.com',20);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Cândido Fonseca da Silva','Rua do Cândido Fonseca da Silva','Centro','(88) 1234-5678','naoenvie@email.com',21);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Mouriac Diemer','Rua do Mouriac Diemer','Centro','(88) 1234-5678','naoenvie@email.com',9);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Leonardo Lemes','Rua do Leonardo Lemes','Centro','(88) 1234-5678','naoenvie@email.com',22);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Luciano Greiner Dos Santos','Rua do Luciano Greiner Dos Santos','Centro','(88) 1234-5678','naoenvie@email.com',23);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Matheus Agnes Dias','Rua do Matheus Agnes Dias','Centro','(88) 1234-5678','naoenvie@email.com',6);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Mauricio de Castro','Rua do Mauricio de Castro','Centro','(88) 1234-5678','naoenvie@email.com',21);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Nataniel Rabaioli','Rua do Nataniel Rabaioli','Centro','(88) 1234-5678','naoenvie@email.com',22);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Paulo Roberto Mallmann','Rua do Paulo Roberto Mallmann','Centro','(88) 1234-5678','naoenvie@email.com',20);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Rubens Prates','Rua do Rubens Prates','Centro','(88) 1234-5678','naoenvie@email.com',27);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Rubens Queiroz de Almeida','Rua do Rubens Queiroz de Almeida','Centro','(88) 1234-5678','naoenvie@email.com',2);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Sergio Crespo Pinto','Rua do Sergio Crespo Pinto','Centro','(88) 1234-5678','naoenvie@email.com',9);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('Silvio Cesar Cazella','Rua do Silvio Cesar Cazella','Centro','(88) 1234-5678','naoenvie@email.com',18);
INSERT INTO STORE.PESSOA (NO_PESSOA, DS_ENDERECO, NO_BAIRRO, NU_TELEFONE, DS_EMAIL, NU_CIDADE) VALUES('William Prigol Lopes','Rua do William Prigol Lopes','Centro','(88) 1234-5678','naoenvie@email.com',18);
COMMIT;





