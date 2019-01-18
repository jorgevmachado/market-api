<?php

namespace App\Policies;

use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;

class MaterialColetaEnvioPolicy
{
    use HandlesAuthorization;

    public function removerBemPatrimonial(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function materialColetaEnvio(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function alterarEstadoConservacaoBemPatrimonial(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function alterarCondicaoBemPatrimonial(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function incluirTomboBemPatrimonial(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }
}
