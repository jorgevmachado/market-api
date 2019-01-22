/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     21/01/2019 23:00:05                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: ITEM_VENDA                                            */
/*==============================================================*/
CREATE TABLE STORE.ITEM_VENDA (
                             NU_ITEM_VENDA         NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             NU_QUANTIDADE     NUMBER(33)            NOT NULL,
                             VL_PRECO          NUMBER(7,2)           NOT NULL,
                             NU_PRODUTO        NUMBER(10)            NOT NULL,
                             NU_VENDA          NUMBER(10)            NOT NULL,
                             CONSTRAINT ITEM_VENDA_PK PRIMARY KEY (NU_ITEM_VENDA),
                             CONSTRAINT PRODUTO_ITEM_VENDA_FK FOREIGN KEY (NU_PRODUTO) REFERENCES STORE.PRODUTO(NU_PRODUTO),
                             CONSTRAINT VENDA_ITEM_VENDA_FK FOREIGN KEY (NU_VENDA) REFERENCES STORE.VENDA(NU_VENDA)
);

COMMENT ON TABLE STORE.ITEM_VENDA IS
  'Tabela para armazenar os dados da ITEM_VENDA.';

COMMENT ON COLUMN STORE.ITEM_VENDA.NU_ITEM_VENDA IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.ITEM_VENDA.VL_PRECO    IS
  'Preço de itens vendidos.';

COMMENT ON COLUMN STORE.ITEM_VENDA.NU_QUANTIDADE    IS
  'Quantidade de itens vendidos.';

COMMENT ON COLUMN STORE.ITEM_VENDA.NU_PRODUTO    IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

COMMENT ON COLUMN STORE.ITEM_VENDA.NU_VENDA    IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(1.0, 40.0,  1, 4);
INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(2.0, 180.0, 2, 4);
INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(3.0, 35.0,  3, 5);
INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(4.0, 41.0,  4, 5);
COMMIT;
