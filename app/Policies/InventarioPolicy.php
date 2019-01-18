<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class InventarioPolicy extends PolicyAbstract
{
    use HandlesAuthorization;


    public function getAnoInventarioPorPerfil(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request) ||
            self::check(Constants::ROLE_CONSIGNATARIO, $request) ||
            self::check(Constants::ROLE_MEMBRO_AUXILIAR, $request) ||
            self::check(Constants::ROLE_MEMBRO_COMISSAO, $request);
    }

    public function getInventarioAnual(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request) ||
            self::check(Constants::ROLE_MEMBRO_COMISSAO, $request);
    }

    public function getAnoInventarioAnualPeriodoPorPerfil(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function getMembroAuxiliarByLotacaoInventario(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }
}
