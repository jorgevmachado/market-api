<?php

namespace App\Service\Pessoa\Command;

final class IncluirPessoaCommand
{
    /**
     * @var string
     */
    private $nome;

    /**
     * @var string
     */
    private $endereco;

    /**
     * @var string
     */
    private $bairro;

    /**
     * @var string
     */
    private $telefone;

    /**]
     * @var string
     */
    private $email;

    /**
     * @var int
     */
    private $cidade;

    /**
     * IncluirPessoaCommand constructor.
     * @param string $nome
     * @param string $endereco
     * @param string $bairro
     * @param string $telefone
     * @param string $email
     * @param int $cidade
     */
    public function __construct(
        string $nome,
        string $endereco,
        string $bairro,
        string $telefone,
        string $email,
        int $cidade
    )
    {
        $this->nome = $nome;
        $this->endereco = $endereco;
        $this->bairro = $bairro;
        $this->telefone = $telefone;
        $this->email = $email;
        $this->cidade = $cidade;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    /**
     * @return string
     */
    public function getEndereco(): string
    {
        return $this->endereco;
    }

    /**
     * @return string
     */
    public function getBairro(): string
    {
        return $this->bairro;
    }

    /**
     * @return string
     */
    public function getTelefone(): string
    {
        return $this->telefone;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getCidade(): int
    {
        return $this->cidade;
    }
}
