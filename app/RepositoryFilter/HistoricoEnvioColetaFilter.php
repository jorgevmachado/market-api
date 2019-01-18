<?php


namespace App\RepositoryFilter;

class HistoricoEnvioColetaFilter extends AbstractQueryFilter
{

    protected function matricula($matricula)
    {
        $this->builder
            ->andWhere($this->rootAlias . '.matricula = :matricula')
            ->setParameter('matricula', $matricula);
    }

    protected function inventario($id)
    {
        $this->builder
            ->join($this->rootAlias . '.coleta', 'c')
            ->andWhere('c.inventario = :idInventario')
            ->setParameter('idInventario', $id);
    }

    protected function lotacao($id)
    {
        $this->builder
            ->join($this->rootAlias . '.coleta', 'cc')
            ->andWhere('cc.lotacao = :idLotacao')
            ->setParameter('idLotacao', $id);
    }
}
