<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {
            if (auth()->user()->level == 'new') {
                auth()->logout();
                return back()->withErrors('عضویت شما تایید نشده است لطفا به کتابخانه مراجعه کنید.');
            }
        }

        return $next($request);
    }
}
