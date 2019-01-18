<?php


namespace App\RepositoryFilter;

class AuditoriaFilter extends AbstractQueryFilter
{
    protected function nomeTabela(string $tableName)
    {
        $this->builder
            ->andWhere('lower(' . $this->rootAlias . '.nomeTabela) = lower(:tableName)')
            ->setParameter('tableName', $tableName);
    }

    protected function numeroRegistroLogado($id)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.numeroRegistroLogado = :id')
            ->setParameter('id', $id);
    }

    protected function tipoOperacao($operationType)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.tipoOperacao = :operationType')
            ->setParameter('operationType', $operationType);
    }

    protected function matricula($matricula)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.matricula = :matricula')
            ->setParameter('matricula', $matricula);
    }
}
