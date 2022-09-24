<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PostController extends Controller
{
    public function search()
    {
        return Post::with(['category' , 'user'])->get();
    }

    public function edit(Request $request , Post $post)
    {
        return Inertia::render('post/edit' , compact('post'));
    }

    public function updating(Request $request)
    {
         Post::where('id' , $request->post_id)->update([
            'name' => $request->name
         ]);
         return Redirect::route('posts');
    }
}
