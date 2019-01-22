/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     21/01/2019 23:00:05                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: CONTA                                            */
/*==============================================================*/
CREATE TABLE STORE.CONTA (
                             NU_CONTA         NUMBER(10)
                             GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             DT_EMISSAO        TIMESTAMP             NOT NULL,
                             DT_VENCIMENTO     TIMESTAMP             NOT NULL,
                             VL_CONTA          NUMBER(7,2)           NOT NULL,
                             FG_PAGO           VARCHAR2(1 BYTE)      NOT NULL,
                             NU_CLIENTE        NUMBER(10)            NOT NULL,
                             CONSTRAINT CONTA_PK PRIMARY KEY (NU_CONTA),
                             CONSTRAINT CLIENTE_CONTA_FK FOREIGN KEY (NU_CLIENTE) REFERENCES STORE.PESSOA(NU_PESSOA)
);

COMMENT ON TABLE STORE.CONTA IS
  'Tabela para armazenar os dados da CONTA.';

COMMENT ON COLUMN STORE.CONTA.NU_CONTA IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.CONTA.DT_EMISSAO    IS
  'Data de emissão da conta.';

COMMENT ON COLUMN STORE.CONTA.DT_VENCIMENTO    IS
  'Data de vencimento da conta.';

COMMENT ON COLUMN STORE.CONTA.VL_CONTA    IS
  'Valor da conta.';

COMMENT ON COLUMN STORE.CONTA.FG_PAGO    IS
  'Flag de pagamento ( "N" = Não Pago, "S" = Pago).';

COMMENT ON COLUMN STORE.CONTA.NU_CLIENTE    IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

INSERT INTO STORE.CONTA (DT_EMISSAO,DT_VENCIMENTO,VL_CONTA,FG_PAGO,NU_CLIENTE) VALUES('01/01/2019','01/02/2019',195.0, 'N', 1);
INSERT INTO STORE.CONTA (DT_EMISSAO,DT_VENCIMENTO,VL_CONTA,FG_PAGO,NU_CLIENTE) VALUES('02/01/2019', '02/02/2019',195.0, 'N', 1);
INSERT INTO STORE.CONTA (DT_EMISSAO,DT_VENCIMENTO,VL_CONTA,FG_PAGO,NU_CLIENTE) VALUES('03/01/2019','03/02/2019',132.5, 'S', 2);
INSERT INTO STORE.CONTA (DT_EMISSAO,DT_VENCIMENTO,VL_CONTA,FG_PAGO,NU_CLIENTE) VALUES('04/01/2019','04/02/2019',132.5, 'N', 2);
COMMIT;
