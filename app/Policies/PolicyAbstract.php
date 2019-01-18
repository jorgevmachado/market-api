<?php

namespace App\Policies;

use Illuminate\Http\Request;

class PolicyAbstract
{
    protected static function check($role, Request $request)
    {
        return in_array($role, $request->attributes->get('roles'));
    }
}
