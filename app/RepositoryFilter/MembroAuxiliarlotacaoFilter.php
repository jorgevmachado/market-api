<?php

namespace App\RepositoryFilter;

class MembroAuxiliarlotacaoFilter extends AbstractQueryFilter
{

    public function membroInventario($id)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.membroInventario', 'mi')
            ->andWhere('mi.id = :id')
            ->setParameter('id', $id);
    }
}
