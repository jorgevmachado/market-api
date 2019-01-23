<?php

namespace App\Service\Cidade\Command;


final class EditarCidadeCommand
{

    /**
     * @var int
     */
    private $id;
    /**
     * @var int
     */
    private $estadoId;

    /**
     * @var string
     */
    private $cidade;

    /**
     * IncluirCidadeCommand constructor.
     * @param int $id
     * @param int $estadoId
     * @param string $cidade
     */
    public function __construct(
        int $id,
        int $estadoId,
        string $cidade
    ){
        $this->id = $id;
        $this->estadoId = $estadoId;
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
     * @return int
     */
    public function getEstadoId(): int
    {
        return $this->estadoId;
    }

    /**
     * @return string
     */
    public function getCidade(): string
    {
        return $this->cidade;
    }
}
