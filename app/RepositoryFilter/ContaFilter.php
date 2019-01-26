<?php

namespace App\RepositoryFilter;

class ContaFilter extends AbstractQueryFilter
{
    protected function pago(string $pago)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.pago) = upper(:fg_pago)')
            ->setParameter('fg_pago',$pago);
    }
}
