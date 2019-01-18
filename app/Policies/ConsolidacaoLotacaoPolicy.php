<?php

namespace App\Policies;

use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConsolidacaoLotacaoPolicy
{
    use HandlesAuthorization;

    public function index(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function podeConsolidar(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }
}
