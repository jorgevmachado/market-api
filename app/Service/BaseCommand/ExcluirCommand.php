<?php

namespace App\Service\BaseCommand;

class ExcluirCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * ExcluirUnidadeCommand constructor.
     * @param int $id
     */
    public function __construct(int $id)
    {
        $this->id = $id;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }
}