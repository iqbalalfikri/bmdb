<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class EditProfile
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
         * Mengecek apakah user yang sedang login adalah admin
         * atau user yang ingin edit profile adalah user yang sama dengan user yang sedang log in (jika role-nya adalah member)
         */
        if (auth()->user()->role_id == 1 || auth()->user()->id == $request->user)
            return $next($request);

        return redirect('/');
    }
}
