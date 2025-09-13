<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthHelp
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next ): Response
    {
        echo '<h1>Hello from AuthHelp Middleware</h1>';
        if (Auth::user()) {
            return $next($request);
        }else{
            return redirect()->route('login')->with('error','Your are not login,');
        }
    }
}
