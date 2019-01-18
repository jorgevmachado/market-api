<?php

namespace App\RepositoryFilter;

class ColetaFilter extends AbstractQueryFilter
{
    protected function status(int $status)
    {
        $this->builder
          ->andWhere($this->rootAlias . '.status = :nu_status_atual_coleta')
          ->setParameter('nu_status_atual_coleta', $status);
    }

    protected function lotacao($idLotacao)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.lotacao', 'lot')
            ->andWhere('lot.id = :lotacao')
            ->setParameter('lotacao', $idLotacao);
    }

    protected function matricula(string $matricula)
    {
        $this->builder
            ->andWhere('upper(' . $this->rootAlias . '.matricula) = upper(:nu_matricula)')
            ->setParameter('nu_matricula', $matricula);
    }

    protected function tipoInventario(string $tipoInventario)
    {
        //coleta eventual
        if ($tipoInventario === 'C') {
            $this->builder
                ->andWhere($this->rootAlias . '.inventario is null');
        } else {
            $this->builder
                ->innerJoin($this->rootAlias . '.inventario', 'inv')
                ->andWhere('inv.tipo = :ti_inventario')
                ->setParameter('ti_inventario', $tipoInventario);
        }
    }

    protected function anoInventario($ano)
    {
        $this->builder
            ->innerJoin($this->rootAlias . '.inventario', 'invv')
            ->andWhere('invv.ano = :nu_ano_referencia')
            ->setParameter('nu_ano_referencia', $ano);
    }

    protected function anoColeta($ano)
    {
        $this->builder
            ->andWhere('ExtractYear('. $this->rootAlias . '.dataColeta) = :ano')
            ->setParameter('ano', $ano);
    }
}
