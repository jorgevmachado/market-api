<?php

namespace App\Service\Cidade\Command;


final class ExcluirCidadeCommand
{

    /**
     * @var int
     */
    private $cidadeId;

    /**
     * ExcluirCidadeCommand constructor.
     * @param int $cidadeId
     */
    public function __construct(int $cidadeId)
    {
        $this->cidadeId = $cidadeId;
    }

    /**
     * @return int
     */
    public function getCidadeId(): int
    {
        return $this->cidadeId;
    }
}