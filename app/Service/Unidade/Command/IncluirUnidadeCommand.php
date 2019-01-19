<?php

namespace App\Service\Unidade\Command;


final class IncluirUnidadeCommand
{
    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $unidade;

    /**
     * IncluirUnidadeCommand constructor.
     * @param string $sigla
     * @param string $unidade
     */
    public function __construct(string $sigla, string $unidade)
    {
        $this->sigla = $sigla;
        $this->unidade = $unidade;
    }

    /**
     * @return string
     */
    public function getSigla(): string
    {
        return $this->sigla;
    }

    /**
     * @return string
     */
    public function getUnidade(): string
    {
        return $this->unidade;
    }
}