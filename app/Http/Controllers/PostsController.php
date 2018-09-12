<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('feed')->with('posts', $posts);
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'post_text' => 'required'
        ]);

        $post = new Post;
        $post->body = $request->post_text;
        $post->save();

        return redirect('/feed')->with('success', 'Seu post foi publicado');
    }

    public function show($id)
    {
        //
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
