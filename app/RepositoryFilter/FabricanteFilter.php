<?php

namespace App\RepositoryFilter;

class FabricanteFilter extends AbstractQueryFilter
{
    protected function fabricante(string $fabricante)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.fabricante) = upper(:no_fabricante)')
            ->setParameter('no_fabricante', $fabricante);
    }
}