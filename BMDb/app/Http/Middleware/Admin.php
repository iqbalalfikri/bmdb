<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /**
         * Mengecek apakah user yang login adalah admin atau member
         * admin = 1
         * member = 2
         */
        if (auth()->user()->role_id == 1)
            return $next($request);

        return redirect('/');
    }
}
