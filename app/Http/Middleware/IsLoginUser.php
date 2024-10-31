<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\support\Facades\Auth;

class IsLoginUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check if senfer is login
        if(Auth::check() && Auth::user()->is_admin == 0 )
        {
        return $next($request);
        }
        // return redirect('/login');
        return to_route('books.index');

    }
}