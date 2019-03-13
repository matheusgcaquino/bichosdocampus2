<?php

namespace App\Http\Middleware\Site;

use Closure;

class CheckNivel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $nivel)
    {
        if ($request->user()->nivel_user > $nivel){
            return redirect()->route('home');
        }

        return $next($request);
    }
}
