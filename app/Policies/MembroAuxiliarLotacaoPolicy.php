<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class MembroAuxiliarLotacaoPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function listarMembroAuxiliarLotacao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request)||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function incluirMembroAuxiliarLotacao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request)||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function cancelarMembroAuxiliarLotacao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request)||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function inserirMembroAuxiliarLotacao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request)||
            self::check(Constants::ROLE_ADMIN, $request);
    }
}
