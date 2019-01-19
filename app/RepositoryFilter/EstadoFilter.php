<?php

namespace App\RepositoryFilter;

class EstadoFilter extends AbstractQueryFilter
{
    protected function sigla(string $sigla)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.sigla) = upper(:sg_estado)')
            ->setParameter('sg_estado', $sigla);
    }

    protected function estado(string $estado)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.estado) = upper(:no_estado)')
            ->setParameter('no_estado', $estado);
    }
}