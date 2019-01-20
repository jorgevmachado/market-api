<?php

namespace App\Service\Tipo\Command;


final class IncluirTipoCommand
{
    /**
     * @var string
     */
    private $tipo;

    /**
     * IncluirTipoCommand constructor.
     * @param string $tipo
     */
    public function __construct(string $tipo)
    {
        $this->tipo = $tipo;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }
}