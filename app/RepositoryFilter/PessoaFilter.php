<?php

namespace App\RepositoryFilter;

class PessoaFilter extends AbstractQueryFilter
{
    protected function nome(string $nome)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.nome) = upper(:no_pessoa)')
            ->setParameter('no_pessoa',$nome);
    }
}
