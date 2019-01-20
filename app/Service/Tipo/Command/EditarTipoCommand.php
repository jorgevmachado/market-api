<?php

namespace App\Service\Tipo\Command;

final class EditarTipoCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $tipo;

    /**
     * EditarTipoCommand constructor.
     * @param int $id
     * @param string $tipo
     */
    public function __construct(int $id, string $tipo)
    {
        $this->id = $id;
        $this->tipo = $tipo;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTipo(): string
    {
        return $this->tipo;
    }
}