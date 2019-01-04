<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class IsUser
{
    /**
     * Handle an incoming request for check user role.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() &&  Auth::user()->role == 'user') {
            return $next($request);
        } elseif (Auth::user() &&  Auth::user()->role == 'admin') {
            return redirect('admin');
        }
        abort(404);
    }
}
