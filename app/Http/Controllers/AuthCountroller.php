<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthCountroller extends Controller
{
    public function register()
    {
        // $users=User::get();
        return view ('auth.register');
    }
}
