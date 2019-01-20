<?php

namespace App\Service\BaseCommand;

class Command
{
    /**
     * @var int
     */
    private $id;

    /**
     * Command constructor.
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