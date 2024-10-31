<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\support\Facades\Auth;
class IsLogin
{
   
    public function handle( $request, Closure $next)
    {
        // check if senfer is login
        if(Auth::check())
        {
        return $next($request);
        }
        // return redirect('/login');
        return to_route('auth.login');

    }
}
