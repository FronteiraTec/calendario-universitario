<?php

namespace App\Http\Middleware;

use Closure;

class HandleResourcePermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $module)
    {
        $requestedLevel = 1; // Isso da conta dos metodos edit, update, show e index
        switch($request->route()->getActionMethod()) {
            case 'create':
            case 'store':
                $requestedLevel = 2;
                break;
            case 'destroy':
                $requestedLevel = 3;
                break;
        }
        if (!$request->user()->hasPermission($module, $requestedLevel)) {
            return abort(403);
        }
        return $next($request);
    }
}
