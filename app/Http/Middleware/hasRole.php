<?php


namespace App\Http\Middleware;

use App\Roles;
use Closure;
use Illuminate\Support\Facades\Auth;

class hasRole
{
    public function handle($request, Closure $next, $role)
    {
        if ($role !== strtolower(Auth::user()->roles->name)) {
            return response('You don\'t have enough access to do this request.', 401);
        }

        return $next($request);
    }
}
