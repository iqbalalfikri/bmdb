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
        if (auth()->user()->role_id == 1 || auth()->user()->id == $request->user)
            return $next($request);

        return redirect('/');
    }
}
