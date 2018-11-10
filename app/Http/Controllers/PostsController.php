<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Post;
use App\Like;

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

        return redirect('/')->with('success', 'Seu post foi publicado');
    }

    public function likePost(Request $request) {
        $post_id = $request['postId'];
        $post = Post::find($post_id);

        $user = Auth::user();
        $like = $user->likes()->where('post_id', $post_id)->first();
        $is_liked = $like != null;
        if ($is_liked) {
            $like->delete();
            return 'dislike';
        } else {
            $newLike = new Like;
            $newLike->post_id = $post_id;
            $newLike->user_username = $user->username;
            $newLike->save();
        }

        return 'like';
    }

    public function getLikes(Request $request) {
        $post_id = $request['post_id'];
        $post = Post::find($post_id);
        $num_likes = count($post->likes);
        if ($num_likes > 0) {
            header('Content-Type: application/json');
            return json_encode(['response' => '<small class="align-middle text-muted">'. $num_likes .'</small>']);
        }
        return json_encode(['response' => '']);
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
