<?php

namespace App\Http\Middleware;

use Closure;

class HandlePermissions
{
    public function handle($request, Closure $next, $module, $level = 1)
    {
        if (!$request->user()->hasPermission($module, $level)) {
            return abort(403);
        }
        return $next($request);
    }
}
