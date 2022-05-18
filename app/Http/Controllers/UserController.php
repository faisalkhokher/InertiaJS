<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index()
    {
        // return User::paginate(10);
        return Inertia::render('users',[
            "users" => User::paginate(10),
        ]);
    }
}
