<?php

namespace App\Service\Cidade\Command;

final class IncluirCidadeCommand
{
    /**
     * @var int
     */
    private $estado;

    /**
     * @var string
     */
    private $cidade;

    /**
     * IncluirCidadeCommand constructor.
     * @param string $cidade
     * @param int $estado
     */
    public function __construct(
        int $estado,
        string $cidade
    ){
        $this->cidade = $cidade;
        $this->estado = $estado;
    }

    /**
     * @return string
     */
    public function getCidade(): string
    {
        return $this->cidade;
    }

    /**
     * @return int
     */
    public function getEstado(): int
    {
        return $this->estado;
    }
}
