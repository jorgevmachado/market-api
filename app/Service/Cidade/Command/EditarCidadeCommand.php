<?php

namespace App\Service\Cidade\Command;


final class EditarCidadeCommand
{

    /**
     * @var int
     */
    private $cidadeId;
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
     * @param int $cidadeId
     * @param int $estadoId
     * @param string $cidade
     */
    public function __construct(
        int $cidadeId,
        int $estadoId,
        string $cidade
    ){
        $this->cidadeId = $cidadeId;
        $this->estadoId = $estadoId;
        $this->cidade = $cidade;

    }

    /**
     * @return int
     */
    public function getCidadeId(): int
    {
        return $this->cidadeId;
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