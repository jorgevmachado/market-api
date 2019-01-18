<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class MembroInventarioPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function listarMembroAuxiliar(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function listarMembroComissao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request);
    }

    public function inserirMembroInventario(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request);
    }

    public function excluirMembroInventarioAuxiliar(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function excluirMembroInventarioComissao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request);
    }

    public function cancelarMembroInventarioComissao(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request);
    }

    public function getLotacaoSarh(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_MEMBRO_COMISSAO, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function getLotacaoMembroAuxiliarAutoComplete(TraTbUsuaUsuario $user)
    {
        return $user->isMembroComissao() || $user->isAdmin();
    }

    public function getLotacaoColetaEnviadaMembroAuxiliarAutoComplete(TraTbUsuaUsuario $user)
    {
        return $user->isMembroAuxiliar() || $user->isAdmin();
    }

    public function listLotacaoMembroAuxiliar(TraTbUsuaUsuario $user)
    {
        return $user->isMembroComissao() || $user->isAdmin();
    }

    public function editarMembroAuxiliar(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request) ||
            self::check(Constants::ROLE_MEMBRO_COMISSAO, $request);
    }
}
