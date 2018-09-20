<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Auth;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::orderby('created_at', 'desc')->get();
        return view('post.index')->with('posts', $posts);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_text' => 'required'
        ]);

        $post = new Post;
        $post->body = $request->post_text;
        $post->user_username = Auth::user()->username;
        $post->save();

        return redirect('/feed')->with('success', 'Seu post foi publicado');
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
}
