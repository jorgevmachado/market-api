<?php

namespace App\RepositoryFilter;

class ProdutoFilter extends AbstractQueryFilter
{
    protected function descricao(string $descricao)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.descricao) = upper(:ds_produto)')
            ->setParameter('ds_produto', $descricao);
    }
}