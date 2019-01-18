<?php

namespace App\Providers;

use App\Constants\Constants;
use Illuminate\Contracts\Auth\UserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use App\TraTbUsuaUsuario;

class KeycloakUserProvider implements UserProvider
{

    public function retrieveById($identifier)
    {
        return TraTbUsuaUsuario::find($identifier);
    }

    public function retrieveByToken($identifier, $token)
    {
        return TraTbUsuaUsuario::find($identifier);
    }

    public function updateRememberToken(Authenticatable $user, $token)
    {
    }

    public function retrieveByCredentials(array $credentials)
    {
        return TraTbUsuaUsuario::where(Constants::USERNAME, $credentials[Constants::USERNAME])->first();
    }

    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return $user->username == $credentials[Constants::USERNAME];
    }
}
