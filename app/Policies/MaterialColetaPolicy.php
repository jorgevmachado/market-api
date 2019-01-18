<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class MaterialColetaPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function removerBemPatrimonial(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isResponsavelColeta();
    }

    public function materialColeta(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isResponsavelColeta();
    }

    public function incluirImagemBemPatrimonial(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }
}
