<?php

namespace App\RepositoryFilter;

class UnidadeFilter extends AbstractQueryFilter
{
    protected function unidade(string $unidade)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.unidade) = upper(:no_unidade)')
            ->setParameter('no_unidade', $unidade);
    }

    protected function sigla(string $sigla)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.sigla) = upper(:sg_unidade)')
            ->setParameter('sg_unidade', $sigla);
    }
}