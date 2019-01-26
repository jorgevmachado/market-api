<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Table(name="historico_operacao")
 * @ORM\Entity(repositoryClass="App\Repository\HistoricoOperacaoRepository")
 */
class HistoricoOperacao
{
    const TIPO_OP_INSERT = 'I';
    const TIPO_OP_UPDATE = 'U';
    const TIPO_OP_DELETE = 'D';
    const TIPO_OP_CANCEL = 'C';
    const TIPO_OP_ACTIVATED = 'A';
    const TIPO_OP_INACTIVATED = 'N';
    const TIPO_OP_REMOVED = 'R';
    const AR_TIPO_OPERACAO = [
        self::TIPO_OP_INSERT => ['operacao' => 'Cadastro', 'estado' => 'Cadastrado'],
        self::TIPO_OP_UPDATE => ['operacao' => 'Alteração', 'estado' => 'Alterado'],
        self::TIPO_OP_DELETE => ['operacao' => 'Exclusão', 'estado' => 'Excluído'],
        self::TIPO_OP_CANCEL => ['operacao' => 'Cancelamento', 'estado' => 'Cancelado'],
        self::TIPO_OP_ACTIVATED => ['operacao' => 'Ativado', 'estado' => 'Ativo'],
        self::TIPO_OP_INACTIVATED => ['operacao' => 'Inativação', 'estado' => 'Inativo'],
        self::TIPO_OP_REMOVED => ['operacao' => 'Remoção', 'estado' => 'Removido'],
    ];

    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_historico_operacao",
     *     length=10,
     *     type="integer",
     *     options={"comment":"Codigo chave da tabela, PK Identity identifica o registro unico"}
     * )
     * @ORM\GeneratedValue(strategy="CUSTOM")
     * @ORM\CustomIdGenerator(class="App\Bridge\Doctrine\ORM\Id\OracleIdentityGenerator")
     */
    private $id;

    /**
     * @var string
     * @ORM\Column(
     *     name="ti_operacao",
     *     length=1,
     *     type="string",
     *     nullable=false,
     *     options={
     *          "comment":"Tipo de operação"
     *     }
     * )
     */
    private $tipoOperacao;

    /**
     * @var \DateTime
     * @ORM\Column(
     *     name="ts_operacao",
     *     type="datetime",
     *     nullable=false,
     *     options={
     *         "comment":"Data e hora de registro da operação"
     *     }
     * )
     */
    private $dataOperacao;

    /**
     * @var string
     * @ORM\Column(
     *     name="no_tabela",
     *     length=30,
     *     type="string",
     *     nullable=false,
     *     options={"comment":"Nome da tabela impactada com a ação que gera o histórico"}
     * )
     */
    private $nomeTabela;

    /**
     * @var int
     * @ORM\Column(
     *     name="nu_registro",
     *     type="integer",
     *     nullable=false,
     *     options={"comment":"Id do registro da tabela impactada com a ação que gera o histórico"}
     * )
     */
    private $numeroRegistro;

    /**
     * @var string
     * @ORM\Column(
     *     name="no_coluna",
     *     length=30,
     *     type="string",
     *     nullable=true,
     *     options={"comment":"Nome da coluna impactada com a ação que gera o histórico"}
     * )
     */
    private $nomeColuna;

    /**
     * @var string
     * @ORM\Column(
     *     name="de_valor_coluna",
     *     length=4000,
     *     type="string",
     *     nullable=true,
     *     options={"comment":"Valor da coluna impactada com a ação que gera o histórico"}
     * )
     */
    private $valorColuna;

    /**
     * @var string
     * @ORM\Column(
     *     name="de_justificativa",
     *     length=4000,
     *     type="string",
     *     nullable=true,
     *     options={"comment":"Texto com o objetivo de justificar a operação realizada"}
     * )
     */
    private $justificativa;

    /**
     * HistoricoOperacao constructor.
     * @param string $nomeTabela
     * @param string $tipoOperacao
     * @param \DateTime $dataOperacao
     * @param int $numeroRegistro
     * @param string $justificativa
     * @param string $nomeColuna
     * @param string $valorColuna
     */
    public function __construct(
        string $nomeTabela,
        string $tipoOperacao,
        \DateTime $dataOperacao,
        int $numeroRegistro,
        string $justificativa = null,
        string $nomeColuna = null,
        string $valorColuna = null
    )
    {
        $this->nomeTabela = $nomeTabela;
        $this->tipoOperacao = $tipoOperacao;
        $this->dataOperacao = $dataOperacao;
        $this->numeroRegistro = $numeroRegistro;
        $this->justificativa = $justificativa;
        $this->nomeColuna = $nomeColuna;
        $this->valorColuna = $valorColuna;
    }
}
