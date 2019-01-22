/*==============================================================*/
/* DBMS name:      ORACLE Version 12c market                    */
/* Created on:     21/01/2019 23:32:54                          */
/*==============================================================*/

/*==============================================================*/
/* PROJETO: MARKET                                              */
/* VERSÃO APLICAÇÃO:   REPOSITORIO:  FULL                       */
/*==============================================================*/

/*==============================================================*/
/* Table: ESTADO                                                */
/*==============================================================*/
CREATE TABLE STORE.ESTADO (
                            NU_ESTADO            NUMBER(10)
                              GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                            SG_ESTADO            VARCHAR2(2 CHAR)  NOT NULL,
                            NO_ESTADO            VARCHAR2(200 CHAR)  NOT NULL,
                            CONSTRAINT ESTADO_PK PRIMARY KEY (NU_ESTADO)
);

COMMENT ON TABLE STORE.ESTADO IS
  'Tabela para armazenar os dados do Estado.';

COMMENT ON COLUMN STORE.ESTADO.NU_ESTADO IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.ESTADO.SG_ESTADO IS
  'Sigla do Estado.';

COMMENT ON COLUMN STORE.ESTADO.NO_ESTADO IS
  'Nome do Estado.';


/*==============================================================*/
/* Index: SIGLA_ESTADO_I                                        */
/*==============================================================*/
CREATE INDEX STORE.SIGLA_ESTADO_I ON STORE.ESTADO (
                                                   SG_ESTADO ASC
  );

INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AC','Acre');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AL','Alagoas');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AP','Amapá');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('AM','Amazonas');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('BA','Bahia');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('CE','Ceará');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('DF','Distrito Federal');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('ES','Espírito Santo');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('GO','Goiás');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MA','Maranhão');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MT','Mato Grosso');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MS','Mato Grosso do Sul');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('MG','Minas Gerais');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PA','Pará');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PB','Paraíba');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PR','Paraná');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PE','Pernambuco');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('PI','Piauí');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RJ','Rio de Janeiro');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RN','Rio Grande do Norte');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RS','Rio Grande do Sul');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RO','Rondônia');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('RR','Roraima');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('SC','Santa Catarina');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('SP','São Paulo');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('SE','Sergipe');
INSERT INTO STORE.ESTADO (SG_ESTADO, NO_ESTADO)VALUES('TO','Tocantins');
COMMIT;

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

/*==============================================================*/
/* Table: UNIDADE                                            */
/*==============================================================*/
CREATE TABLE STORE.UNIDADE (
                             NU_UNIDADE            NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             SG_UNIDADE            VARCHAR2(5 CHAR)    NOT NULL,
                             NO_UNIDADE            VARCHAR2(200 CHAR)  NOT NULL,
                             CONSTRAINT UNIDADE_PK PRIMARY KEY (NU_UNIDADE)
);

COMMENT ON TABLE STORE.UNIDADE IS
  'Tabela para armazenar os dados de Unidade.';

COMMENT ON COLUMN STORE.UNIDADE.NU_UNIDADE IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.UNIDADE.SG_UNIDADE IS
  'Sigla da Unidade.';

COMMENT ON COLUMN STORE.UNIDADE.NO_UNIDADE IS
  'Nome da Unidade.';

/*==============================================================*/
/* Index: SIGLA_UNIDADE_I                                   */
/*==============================================================*/
CREATE INDEX STORE.SIGLA_UNIDADE_I ON STORE.UNIDADE (
                                                     SG_UNIDADE ASC
  );

INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('cm', 'Centímetro');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('m',  'Metro');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('cm2','Centímetro quadrado');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('m2', 'Metro quadrado');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('cm3','Centímetro cúbico');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('m3', 'Metro cúbico');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('Kg', 'Kilograma');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('Gr', 'Grama');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('L',  'Litro');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('PC', 'Peça');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('PCT','Pacote');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('CX', 'Caixa');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('SAC','Saco');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('TON','Tonelada');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('KIT','Kit');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('GL', 'Galão');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('FD', 'Fardo');
INSERT INTO STORE.UNIDADE(SG_UNIDADE,NO_UNIDADE) VALUES('BL', 'Bloco');
COMMIT;

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

/*==============================================================*/
/* Table: PRODUTO                                            */
/*==============================================================*/
CREATE TABLE STORE.PRODUTO (
                             NU_PRODUTO         NUMBER(10)
                               GENERATED AS IDENTITY ( START WITH 1 INCREMENT BY 1 NOCYCLE NOCACHE NOORDER)  NOT NULL,
                             DS_PRODUTO         VARCHAR2(4000 CHAR)  NOT NULL,
                             QT_ESTOQUE         NUMBER(38) NOT NULL,
                             VL_CUSTO           NUMBER(7,2) NOT NULL,
                             VL_VENDA           NUMBER(7,2) NOT NULL,
                             NU_FABRICANTE      NUMBER(10)  NOT NULL,
                             NU_UNIDADE         NUMBER(10)  NOT NULL,
                             NU_TIPO            NUMBER(10)  NOT NULL,
                             CONSTRAINT PRODUTO_PK PRIMARY KEY (NU_PRODUTO),
                             CONSTRAINT FABRICANTE_PRODUTO_FK FOREIGN KEY (NU_FABRICANTE)
                               REFERENCES STORE.FABRICANTE(NU_FABRICANTE),
                             CONSTRAINT UNIDADE_PRODUTO_FK FOREIGN KEY (NU_UNIDADE)
                               REFERENCES STORE.UNIDADE(NU_UNIDADE),
                             CONSTRAINT TIPO_PRODUTO_FK FOREIGN KEY (NU_TIPO)
                               REFERENCES STORE.TIPO(NU_TIPO)
);

COMMENT ON TABLE STORE.PRODUTO IS
  'Tabela para armazenar os dados do Produto.';

COMMENT ON COLUMN STORE.PRODUTO.NU_PRODUTO IS
  'Chave única da tabela PK, identity, identifica a unicidade do registro.';

COMMENT ON COLUMN STORE.PRODUTO.DS_PRODUTO IS
  'Descrição do produto.';

COMMENT ON COLUMN STORE.PRODUTO.QT_ESTOQUE IS
  'Quantidade de produtos em estoque.';

COMMENT ON COLUMN STORE.PRODUTO.VL_CUSTO IS
  'Valor de custo do Produtos.';

COMMENT ON COLUMN STORE.PRODUTO.VL_VENDA IS
  'Valor de venda do Produtos.';

COMMENT ON COLUMN STORE.PRODUTO.NU_FABRICANTE IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

COMMENT ON COLUMN STORE.PRODUTO.NU_UNIDADE IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

COMMENT ON COLUMN STORE.PRODUTO.NU_TIPO IS
  'Chave única da tabela FK, identifica o relascionamento do registro.';

/*==============================================================*/
/* Index: DESCRICAO_PRODUTO_I                                   */
/*==============================================================*/
CREATE INDEX STORE.DESCRICAO_PRODUTO_I ON STORE.PRODUTO (
                                                         DS_PRODUTO ASC
  );

INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('Pendrive 512Mb',10.0,20.0,40.0,1,10,2);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('HD 120 GB',20.0,100.0,180.0,2,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('SD CARD  512MB',4.0,20.0,35.0,3,10,2);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('SD CARD 1GB MINI',3.0,28.0,40.0,1,10,2);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('CAM. FOTO I70 PLATA',5.0,600.0,900.0,5,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('CAM. FOTO DSC-W50 PLATA',4.0,400.0,700.0,6,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('WEBCAM INSTANT VF0040SP',4.0,50.0,80.0,7,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('CPU 775 CEL.D 360  3.46 512K 533M',10.0,140.0,300.0,8,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('FILMADORA DCR-DVD108',2.0,900.0,1400.0,6,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('HD IDE  80G 7.200',8.0,90.0,160.0,5,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('IMP LASERJET 1018 USB 2.0',4.0,200.0,300.0,9,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('MEM DDR  512MB 400MHZ PC3200',10.0,60.0,100.0,5,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('MEM DDR2 1024MB 533MHZ PC4200',5.0,100.0,170.0,3,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('MON LCD 19 920N PRETO',2.0,500.0,800.0,5,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('MOUSE USB OMC90S OPT.C/LUZ',10.0,20.0,40.0,5,10,2);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('NB DV6108 CS 1.86/512/80/DVD+RW ',2.0,1400.0,2500.0,9,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('NB N220E/B DC 1.6/1/80/DVD+RW ',3.0,1800.0,3400.0,6,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('CAM. FOTO DSC-W90 PLATA',5.0,600.0,1200.0,6,10,1);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('CART. 8767 NEGRO',20.0,30.0,50.0,9,10,3);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('CD-R TUBO DE 100 52X 700MB',20.0,30.0,60.0,5,10,5);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('MEM DDR 1024MB 400MHZ PC3200',7.0,80.0,150.0,1,10,4);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('MOUSE PS2 A7 AZUL/PLATA',20.0,5.0,15.0,10,10,2);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('SPEAKER AS-5100 HOME PRATA',5.0,100.0,180.0,10,10,2);
INSERT INTO STORE.PRODUTO(DS_PRODUTO,QT_ESTOQUE, VL_CUSTO, VL_VENDA, NU_FABRICANTE, NU_UNIDADE, NU_TIPO) VALUES('TEC. USB ABNT AK-806',14.0,20.0,40.0,10,10,2);
COMMIT;

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

INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(1.0, 40.0,  1, 1);
INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(2.0, 180.0, 2, 1);
INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(3.0, 35.0,  3, 2);
INSERT INTO STORE.ITEM_VENDA (NU_QUANTIDADE,VL_PRECO,NU_PRODUTO,NU_VENDA) VALUES(4.0, 41.0,  4, 2);
COMMIT;

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
