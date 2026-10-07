<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkIsActive
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            if (!$user->isActive) {
                return redirect()->back()->with('failure', 'در حال حاضر حساب کاربری شما فعال نشده است.');
            }
        } else {
            return to_route("user.login");
        }
        return $next($request);
    }
}
