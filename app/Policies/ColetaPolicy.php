<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Http\Request;
use Illuminate\Auth\Access\HandlesAuthorization;

class ColetaPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function index(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request);
    }

    public function delete(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function enviarColetaMA(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function getAnoColetaEventualPorPerfil(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function getColetasPorPerfil(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function listarMatriculaColeta(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_ADMIN, $request);
    }

    /**
     * #TODO: verificar se todos os perfis podem exportar
     *
     * @param TraTbUsuaUsuario $user
     * @param Request $request
     * @return bool
     */
    public function exportPDF(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    /**
     * #TODO: verificar se todos os perfis podem exportar
     *
     * @param TraTbUsuaUsuario $user
     * @param Request $request
     * @return bool
     */
    public function exportCSV(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_RESPONSAVEL_COLETA, $request) ||
            self::check(Constants::ROLE_ADMIN, $request);
    }

    public function listarEnvioMA(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function invalidarEnvioMA(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }

    public function podeConsolidar(TraTbUsuaUsuario $user)
    {
        return $user->isAdmin() || $user->isMembroAuxiliar();
    }
}
