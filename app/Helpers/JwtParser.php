<?php

namespace App\Helpers;

class JwtParser
{
    /**
     * @var array
     */
    private static $roles = [];

    private static function parseIn($value)
    {
        foreach ($value as $role) {
            self::$roles = $role;
        }
    }

    private static function parseNotIn($value)
    {
        foreach ($value as $systemKey => $systemValue) {
            if ($systemKey == config('auth.auth_roles_key')) {
                self::parseIn($systemValue);
            }
        }
    }

    /**
     * Devolve as roles que o usuário tem no servidor de autenticação.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public static function roles($jwtToken)
    {

        foreach ($jwtToken->getClaim('resource_access') as $key => $value) {
            if ($key == config('auth.auth_roles_key')) {
                self::$roles = $value->roles;
                continue;
            }
            self::parseNotIn($value);
        }

        return self::$roles;
    }
}
