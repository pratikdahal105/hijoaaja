<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Creator
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $role = Auth::user()->role_id;
        if($role == 3 || $role == 2 || $role == 1){
            return $next($request);
        }else{
            return view('backend.pages.404');
        }
    }
}
