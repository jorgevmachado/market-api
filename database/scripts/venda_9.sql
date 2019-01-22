/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     21/01/2019 22:58:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: VENDA                                            */
/*==============================================================*/
CREATE TABLE STORE.VENDA (
                             NU_VENDA         NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             DT_VENDA          TIMESTAMP            NOT NULL,
                             VL_VENDA          NUMBER(7,2)          NOT NULL,
                             VL_DESCONTO       NUMBER(7,2)          NULL,
                             VL_ACRESCIMO      NUMBER(7,2)          NULL,
                             VL_FINAL          NUMBER(7,2)          NOT NULL,
                             DS_OBSERVACAO     VARCHAR2(4000 CHAR)  NOT NULL,
                             NU_CLIENTE        NUMBER(10)           NOT NULL,
                             CONSTRAINT VENDA_PK PRIMARY KEY (NU_VENDA),
                             CONSTRAINT CLIENTE_VENDA_FK FOREIGN KEY (NU_CLIENTE) REFERENCES STORE.PESSOA(NU_PESSOA)
);

COMMENT ON TABLE STORE.VENDA IS
  'Tabela para armazenar os dados da VENDA.';

COMMENT ON COLUMN STORE.VENDA.NU_VENDA IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.VENDA.DT_VENDA      IS
  'Data da venda.';

COMMENT ON COLUMN STORE.VENDA.VL_VENDA      IS
  'Valor da venda.';

COMMENT ON COLUMN STORE.VENDA.VL_DESCONTO   IS
  'Valor do desconto da venda.';

COMMENT ON COLUMN STORE.VENDA.VL_ACRESCIMO  IS
  'Valor de acrescimo na venda.';

COMMENT ON COLUMN STORE.VENDA.VL_FINAL      IS
  'valor final  da venda.';
COMMENT ON COLUMN STORE.VENDA.DS_OBSERVACAO IS
  'Observações sobre a venda.';
COMMENT ON COLUMN STORE.VENDA.NU_CLIENTE    IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

/*==============================================================*/
/* Index: NOME_VENDA_I                                   */
/*==============================================================*/
CREATE INDEX STORE.DATA_VENDA_I ON STORE.VENDA (
                                                         DT_VENDA ASC
);
INSERT INTO STORE.VENDA (
                         DT_VENDA,
                         VL_VENDA,
                         VL_DESCONTO,
                         VL_ACRESCIMO,
                         VL_FINAL,
                         DS_OBSERVACAO,
                         NU_CLIENTE
) VALUES('01/01/2018',400.0,50.0,40.0,390.0,'teste',1);
INSERT INTO STORE.VENDA (
                        DT_VENDA,
                        VL_VENDA,
                        VL_DESCONTO,
                        VL_ACRESCIMO,
                        VL_FINAL,
                        DS_OBSERVACAO,
                        NU_CLIENTE
) VALUES('01/01/2018',265.0,NULL,NULL,265.0,'teste2',2);
COMMIT;
