<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $role)
    {
        if(Auth::check()){
            if(Auth::user()->isAdmin()){
if($role<=15){
    return redirect('/');
                }
                return $next($request);
            }


        }


        return redirect('/');
    }
}
