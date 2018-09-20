<?php

namespace App\Http\Controllers;

use App\portfolio;
use App\Post;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class portfolioController extends Controller
{
    public function index($user_username)
    {
        $user = User::findOrFail($user_username);
        return view('portfolio.index')->with('user', $user);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'titulo' => 'required',
            'descricao' => 'required'
        ]);

        $portfolio = new portfolio;
        $portfolio->titulo = $request->titulo;
        $portfolio->descricao = $request->descricao;
        $portfolio->user_username = Auth::user()->username;
        $portfolio->save();

        $post = new Post;
        $post->user_username = Auth::user()->username;
        $post->body = "Criou um novo portifólio chamado " . $portfolio->titulo;
        $post->save();

        return redirect('/user/'.Auth::user()->username)->with('success', 'Seu portfolio foi criado');
    }

    public function show(portfolio $portfolio)
    {
        //
    }

    public function update(Request $request, portfolio $portfolio)
    {
        //
    }

    public function destroy(portfolio $portfolio)
    {
        //
    }
}
