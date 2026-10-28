<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class checkAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next, $permission = null): Response
    {
        if (Auth::check()) {
            if ($permission) {
                if (!Gate::allows('access', [$permission])) {
                    return to_route("home")->with('failure', 'شما به این صفحه دسترسی ندارید.');
                }
            } else {
                return to_route("home")->with('failure', 'شما به این صفحه دسترسی ندارید.');
            }
        } else {
            return to_route("user.login")->with('failure', 'ابتدا وارد شوید.');
        }
        return $next($request);
    }
}
