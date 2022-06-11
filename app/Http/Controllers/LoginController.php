<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function create()
    {
        return Inertia::render('Auth/Login');
    }

    public function register(Request $request)
    {
        return Inertia::render('Auth/Register');
    }

    public function store(Request $request)
    {
        dd($request->all());

    }

    public function login(Request $request) //
    {
        if (\Auth::attempt([ 'email' => $request->email, 'password' => $request->password]))
        {
            return redirect()->route('home');
        }
        else
        {
            return "Not Authenticated";
        }
    }
}
