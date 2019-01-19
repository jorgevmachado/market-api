<?php

namespace App\Service\Fabricante\Command;


final class EditarFabricanteCommand
{

    /**
     * @var int
     */
    private $fabricanteId;

    /**
     * @var string
     */
    private $fabricante;

    /**
     * @var string
     */
    private $site;

    /**
     * EditarFabricanteCommand constructor.
     * @param int $fabricanteId
     * @param string $fabricante
     * @param string $site
     */
    public function __construct(int $fabricanteId, string $fabricante, string $site)
    {
        $this->fabricanteId = $fabricanteId;
        $this->fabricante = $fabricante;
        $this->site = $site;
    }

    /**
     * @return int
     */
    public function getFabricanteId(): int
    {
        return $this->fabricanteId;
    }

    /**
     * @return string
     */
    public function getFabricante(): string
    {
        return $this->fabricante;
    }

    /**
     * @return string
     */
    public function getSite(): string
    {
        return $this->site;
    }
}