<?php

namespace App\RepositoryFilter;

class ConsolidacaoLotacaoFilter extends AbstractQueryFilter
{
    protected function inventario($idInventario)
    {
        //o alias "i" corresponde ao join com verificacaoInconsistencia
        $this->builder
            ->andWhere($this->builder->expr()->eq('i.inventario', $idInventario));
    }

    protected function lotacao($idLotacao)
    {
        //o alias "i" corresponde ao join com verificacaoInconsistencia
        $this->builder
            ->andWhere($this->builder->expr()->eq('i.lotacao', $idLotacao));
    }
}
