<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
Use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class AuthController extends Controller
{
    public function register()
    {
        // $users=User::get();
        return view ('auth.register');
    }

    public function handleregister(request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:100',
            'email'    => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5'
        ]);

        $user = User::create([
            'name'     =>$request->name,
            'email'    =>$request->email,
            'password' =>Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect(route('books.index'));
    }

    public function login()
    {
        // $users=User::get();
        return view ('auth.login');
    }
    public function handlelogin(request $request)
    {
        $request->validate([
            'email'    => 'required|email|max:100',
            'password' => 'required|string|max:50|min:5'
        ]);

        $is_login = Auth::attempt(['email'=>$request->email,'password'=>$request->password]);
// dd($is_login);
        if (! $is_login)
        {
            return back();
        }

        return redirect(route('books.index'));

    }

    public function logout()
    {
        Auth::logout();

        return back();
    }

    
}
