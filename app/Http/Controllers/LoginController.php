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
        // dd($request->all());
        if (\Auth::attempt([ 'email' => $request->email, 'password' => $request->password]))
        {
            // dd("OK");
            return response()->json([
                'email' => $request->email, 'password' => $request->password
            ]);
        }
        else
        {
            return response()->json("Not Authenticated");
        }
    }
}
