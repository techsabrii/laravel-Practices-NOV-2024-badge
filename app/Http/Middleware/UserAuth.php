<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        echo '<h1>Hello from UserAuth Middleware</h1>';
        if (Auth::user()) {
            return $next($request);
        }
        else{
            return redirect()->route('login')->with('error','You must be logged in to access this page.');
        }
    }
}
