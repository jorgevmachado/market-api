<?php

namespace App\RepositoryFilter;

class CidadeFilter extends AbstractQueryFilter
{
    protected function cidade(string $cidade)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.cidade) = upper(:no_cidade)')
            ->setParameter('no_cidade', $cidade);
    }

    protected function estado($estado)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.estado', 'est')
            ->andWhere('upper(est.estado) = upper(:estado)')
            ->setParameter('estado', $estado);
    }

    protected function sigla($sigla)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.estado', 'est1')
            ->andWhere('upper(est1.sigla) = upper(:sigla)')
            ->setParameter('sigla', $sigla);
    }
}