<?php

namespace App\RepositoryFilter;

class VerificacaoInconsistenciaFilter extends AbstractQueryFilter
{
    protected function inventario($idInventario)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.inventario', 'i')
            ->andWhere($this->builder->expr()->eq('i.id', $idInventario));
    }

    protected function lotacao($idLotacao)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.lotacao', 'l')
            ->andWhere($this->builder->expr()->eq('l.id', $idLotacao));
    }
}
