<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Request;
use Auth;
use Illuminate\Http\Response;

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
        // dd(Auth::user());
        $role_id = Auth::user()->role_id;
        // dd($role_id);
        if ($role_id == 1 || $role_id == 2)
            return $next($request);
        else
            return new Response(view('unauthorized'));
    }
}
