<?php

namespace App\RepositoryFilter;

class HistoricoOperacaoFilter extends AbstractQueryFilter
{
    protected function nomeTabela(string $nomeTabela)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.nomeTabela) = upper(:no_tabela)')
            ->setParameter('no_tabela', $nomeTabela);
    }

    protected function numeroRegistro( int $id)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.numeroRegistro = :id')
            ->setParameter('id',$id);
    }

    protected function tipoOperacao($tipoOperacao)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.tipoOperacao = :operationType')
            ->setParameter('operationType', $tipoOperacao);
    }
}
