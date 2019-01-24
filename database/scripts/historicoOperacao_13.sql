/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     23/01/2019 20:30:54                          */
/*==============================================================*/


/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:                             */
/*==============================================================*/


/*==============================================================*/
/* Table: HISTORICO_OPERACAO                                                */
/*==============================================================*/
create table STORE.HISTORICO_OPERACAO
(
  NU_HISTORICO_OPERACAO NUMBER(10) generated as identity
    constraint PK_HISTORICO_OPERACAO
      primary key,
  TI_OPERACAO VARCHAR2(1) NOT NULL,
  TS_OPERACAO TIMESTAMP(6) NOT NULL,
  NO_TABELA VARCHAR2(30) NOT NULL,
  NU_REGISTRO VARCHAR2(10) NOT NULL,
  NO_COLUNA VARCHAR2(30),
  DE_VALOR_COLUNA VARCHAR2(4000),
  DE_JUSTIFICATIVA VARCHAR2(4000)
);
COMMENT ON TABLE STORE.HISTORICO_OPERACAO IS
  'Tabela para armazenar o historico de operações realizadas em determinados pontos do sistema';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.NU_HISTORICO_OPERACAO IS
  'Codigo chave da tabela, PK Identity identifica o registro único';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.TI_OPERACAO IS
  'Tipo de operação';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.TS_OPERACAO IS
  'Data e hora de registro da operação';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.NO_TABELA IS
  'Nome da tabela impactada com a ação que gera o histórico';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.NU_REGISTRO IS
  'Id do registro da tabela impactada com a ação que gera o histórico';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.NO_COLUNA IS
  'Nome da coluna impactada com a ação que gera o histórico';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.DE_VALOR_COLUNA IS
  'Valor da coluna impactada com a ação que gera o histórico';

COMMENT ON COLUMN STORE.HISTORICO_OPERACAO.DE_JUSTIFICATIVA IS
  'Texto com o objetivo de justificar a operação realizada.';
