<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class HistoricoOperacaoPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function index(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() ||
            $user->isResponsavelColeta() ||
            $user->isMembroAuxiliar() ||
            $user->isConsignatario() ||
            $user->isMembroComissao();
    }
}
