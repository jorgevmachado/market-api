<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class LotacaoPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function lotacaoPorPerfil(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }
}
