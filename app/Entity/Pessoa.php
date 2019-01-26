<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;
use JMS\Serializer\Annotation as JMS;

/**
 * @ORM\Table(name="pessoa")
 * @ORM\Entity(repositoryClass="App\Repository\PessoaRepository")
 */
class Pessoa
{
    /**
     * @var integer
     * @ORM\Id
     * @ORM\Column(
     *     name="nu_pessoa",
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
     *     name="no_pessoa",
     *     type="string",
     *     length=200,
     *     options={"comment":"Nome da pessoa."}
     * )
     */
    private $nome;

    /**
     * @var string
     * @ORM\Column(
     *     name="ds_endereco",
     *     type="string",
     *     length=700,
     *     options={"comment":"Endereço da pessoa."}
     * )
     */
    private $endereco;

    /**
     * @var string
     * @ORM\Column(
     *     name="no_bairro",
     *     type="string",
     *     length=300,
     *     options={"comment":"Bairro da pessoa."}
     * )
     */
    private $bairro;

    /**
     * @var string
     * @ORM\Column(
     *     name="nu_telefone",
     *     type="string",
     *     length=14,
     *     options={"comment":"Telefone da pessoa."}
     * )
     */
    private $telefone;

    /**
     * @var string
     * @ORM\Column(
     *     name="ds_email",
     *     type="string",
     *     length=64,
     *     options={"comment":"E-mail de contato da pessoa."}
     * )
     */
    private $email;

    /**
     * @var Cidade
     * @ORM\ManyToOne(targetEntity="Cidade")
     * @ORM\JoinColumn(name="nu_cidade", referencedColumnName="nu_cidade")
     */
    private $cidade;

    /**
     * Pessoa constructor.
     * @param string $nome
     * @param string $endereco
     * @param string $bairro
     * @param string $telefone
     * @param string $email
     * @param Cidade $cidade
     */
    public function __construct(
        string $nome,
        string $endereco,
        string $bairro,
        string $telefone,
        string $email,
        Cidade $cidade
    ){
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cidade = $cidade;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param string $nome
     * @return Pessoa
     */
    public function setNome(string $nome): Pessoa
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @param string $endereco
     * @return Pessoa
     */
    public function setEndereco(string $endereco): Pessoa
    {
        $this->endereco = $endereco;
        return $this;
    }

    /**
     * @param string $bairro
     * @return Pessoa
     */
    public function setBairro(string $bairro): Pessoa
    {
        $this->bairro = $bairro;
        return $this;
    }

    /**
     * @param string $telefone
     * @return Pessoa
     */
    public function setTelefone(string $telefone): Pessoa
    {
        $this->telefone = $telefone;
        return $this;
    }

    /**
     * @param string $email
     * @return Pessoa
     */
    public function setEmail(string $email): Pessoa
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @param Cidade $cidade
     * @return Pessoa
     */
    public function setCidade(Cidade $cidade): Pessoa
    {
        $this->cidade = $cidade;
        return $this;
    }
}
