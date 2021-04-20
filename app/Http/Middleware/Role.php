<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ... $role)
    {
        if (!Auth::check()) return redirect('login');

        $user = Auth::user();

        if(strcmp(Auth::user()->role->name , 'admin') === 0)
            return $next($request);
            
        if(strcmp(Auth::user()->role->name , $role) === 0) {
            return $next($request);
        }
        return redirect('login');
    }
}
