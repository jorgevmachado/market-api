<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;

class Pagination
{
    public function handle(Request $request, \Closure $next)
    {
        $request->get('page');
    }
}
