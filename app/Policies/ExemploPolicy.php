<?php

namespace App\Policies;

use App\Constants;
use App\TraTbUsuaUsuario;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Http\Request;

class ExemploPolicy extends PolicyAbstract
{
    use HandlesAuthorization;

    public function index(TraTbUsuaUsuario $user, Request $request)
    {
        return self::check(Constants::ROLE_USUARIO, $request);
    }
}
