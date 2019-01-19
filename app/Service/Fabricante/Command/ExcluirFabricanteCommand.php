<?php

namespace App\Service\Fabricante\Command;


final class ExcluirFabricanteCommand
{

    /**
     * @var int
     */
    private $fabricanteId;

    /**
     * ExcluirFabricanteCommand constructor.
     * @param int $fabricanteId
     */
    public function __construct(int $fabricanteId)
    {
        $this->fabricanteId = $fabricanteId;
    }

    /**
     * @return int
     */
    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }
}