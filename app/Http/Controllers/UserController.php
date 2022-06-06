<?php

namespace App\Http\Controllers;

use App\Models\User;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Validator;

class UserController extends Controller
{
    function index(Request $request)
    {
        // dd($request->all());
        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(10);
        return Inertia::render('Users/index',[
            "users" => $users,
        ]);
    }

    function create(Request $request)
    {
        return Inertia::render('Users/create');
    }

    function createUser(Request $request)
    {
        $attributes = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
        ]);
        User::create($request->all());
        return redirect()->route('users');
    }
}
