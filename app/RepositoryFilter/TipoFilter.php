<?php

namespace App\RepositoryFilter;

class TipoFilter extends AbstractQueryFilter
{
    protected function tipo(string $tipo)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.tipo) = upper(:no_tipo)')
            ->setParameter('no_tipo', $tipo);
    }
}