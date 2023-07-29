<?php

namespace App\Http\Controllers;

use Validator;
use App\Models\User;
use Inertia\Inertia;
use Spatie\Async\Pool;
use Illuminate\Http\Request;

class UserController extends Controller
{
    function index(Request $request)
    {
        // dd($request->all());
        $users = User::query()
            ->when($request->filled('search'), function ($query) use ($request) {
                $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->paginate(5);
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
        return redirect()->route('loginn');
    }

    function test()
    {
        $pool = Pool::create();

        $pool->add(function () {

            $user = User::find(1);
            return $user;
        })
        ->then(function ($output) {
            // On success, `$output` is returned by the process or callable you passed to the queue.
            $output->name;
            dd($output);
        })
        ->catch(function ($exception) {
            // When an exception is thrown from within a process, it's caught and passed here.
            dd("error", $exception);
            throw new \Exception($exception);
        })
        ->timeout(function () {
            exit('Process timed out.');
        });

        $pool->wait();

    }

    function search()
    {
        dd("A");
        return Inertia::render('Users/search');
    }

    public function fetchUsers()
    {
        $users = User::all();
        return $users;
    }
}
