<?php


namespace App\Service\Unidade\Command;


final class EditarUnidadeCommand
{
    /**
     * @var int
     */
    private $id;

    /**
     * @var string
     */
    private $sigla;

    /**
     * @var string
     */
    private $unidade;

    /**
     * EditarUnidadeCommand constructor.
     * @param int $id
     * @param string $sigla
     * @param string $unidade
     */
    public function __construct(int $id, string $sigla, string $unidade)
    {
        $this->id = $id;
        $this->sigla = $sigla;
        $this->unidade = $unidade;
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
    public function getSigla(): string
    {
        return $this->sigla;
    }

    /**
     * @return string
     */
    public function getUnidade(): string
    {
        return $this->unidade;
    }
}