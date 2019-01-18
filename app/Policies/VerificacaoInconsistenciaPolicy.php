<?php

namespace App\Policies;

use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class VerificacaoInconsistenciaPolicy
{
    use HandlesAuthorization;

    public function index(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function verificarInconsistencia(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function exportCSV(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }
}
