<?php

namespace App\Http\Middleware;

use Closure;

class Fablab
{
    private const ADMIN = 2;
    private const FABLAB = 3;

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(!(auth()->user()->ID_Role==self::FABLAB || auth()->user()->ID_Role==self::ADMIN)){
            abort(404);
        }
        return $next($request);
    }
}
