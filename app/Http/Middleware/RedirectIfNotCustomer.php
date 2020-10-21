<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfNotCustomer
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    // public function handle($request, Closure $next)
    // {
    //     return $next($request);
    // }
    public function handle($request, Closure $next, $guard = 'customer')
    {
        if (!auth()->guard($guard)->check()) {
            $request->session()->flash('error', 'You must be logged to see this page');
            return redirect(route('login.html'));
        }

        return $next($request);
    }
}
