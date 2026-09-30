<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class checkAdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (!Gate::allows('access', ['admin'])) {
                return to_route("home")->with('failure', 'شما به این صفحه دسترسی ندارید.');
            }
        } else {
            return to_route("user.login");
        }
        return $next($request);
    }
}
