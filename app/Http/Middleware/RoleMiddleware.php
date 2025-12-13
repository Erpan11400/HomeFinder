<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // jika belum login
        if(!Auth::check()){
            return redirect()->route('login');
        }

        // jika rolenya tidak sesuai
        if(Auth::user()->role !== $role){
            abort(403, 'Unauthorized role');
        }

        return $next($request);
    }
}
