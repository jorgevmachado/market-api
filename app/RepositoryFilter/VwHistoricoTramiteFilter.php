<?php

namespace App\RepositoryFilter;

class VwHistoricoTramiteFilter extends AbstractQueryFilter
{
    public function numeroStatusColeta(int $status)
    {
        $this->builder
            ->andWhere($this->rootAlias .'.numeroStatusColeta = :status')
            ->setParameter(':status', $status);
    }

    public function numeroColeta(int $numeroColeta)
    {
        $this->builder
            ->andWhere($this->rootAlias .'.numeroColeta = :numeroColeta')
            ->setParameter(':numeroColeta', $numeroColeta);
    }

    public function dataHistorico(string $data)
    {
        $this->builder
            ->andWhere($this->rootAlias .'.dataHistorico = :data')
            ->setParameter(':data', $data);
    }
}
