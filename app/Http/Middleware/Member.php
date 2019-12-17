<?php

namespace App\Http\Middleware;

use Closure;

class Member
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
         * Mengecek apakah user yang sedang login adalah member
         */
        if (auth()->user()->role_id == 2)
            return $next($request);

        return redirect('/');
    }
}
