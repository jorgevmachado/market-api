<?php

namespace App\RepositoryFilter;

class MembroInventarioFilter extends AbstractQueryFilter
{
    protected function anoInventario(string $anoInventario)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.inventario', 'invv')
            ->andWhere('invv.ano = :nu_ano_referencia')
            ->setParameter('nu_ano_referencia', $anoInventario);
    }

    protected function tipoMembro(int $tippoMembro)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.tipoMembro = :tipoMembro')
            ->setParameter('tipoMembro', $tippoMembro);
    }

    protected function matricula(string $matricula)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.matricula) = :matricula')
            ->setParameter('matricula', mb_strtoupper($matricula));
    }

    protected function ativo(string $ativo)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.ativo = :ativo')
            ->setParameter('ativo', $ativo);
    }

    protected function tipoFuncaoMembro(string $tipoFuncaoMembro)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.tipoFuncaoMembro = :tipoFuncaoMembro')
            ->setParameter('tipoFuncaoMembro', $tipoFuncaoMembro);
    }
}
