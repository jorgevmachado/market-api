<?php

namespace App\Service\Fabricante\Command;

final class IncluirFabricanteCommand
{
    /**
     * @var string
     */
    private $fabricante;

    /**
     * @var string
     */
    private $site;

    /**
     * IncluirFabricanteCommand constructor.
     * @param string $fabricante
     * @param string $site
     */
    public function __construct(
        string $fabricante,
        string $site
    ){
        $this->fabricante = $fabricante;
        $this->site = $site;
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