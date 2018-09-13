@extends('layout')

@section('conteudo')
    <div class="row">
        <div class="col-2 card">
            <div class="card-body text-center">
                <img class="img-fluid rounded-circle mb-4" src="{{asset('img/noimage.jpg')}}" alt="">
                <h4>{{$user->name}}</h4>
                <hr class="mb-3">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore </p>
            </div>
        </div>
        <div class="col-7 ml-3 card">
            <div class="card-body">
                <h3>Portifólios</h3>
            </div>
        </div>
    </div>
    <div class="row mt-3 mb-5">
        <div class="col-3 card rb-feed-profile">
            @if(count($user->posts) > 0)
                @foreach ($user->posts as $post)
                    <div class="">
                        <div class="rb-post-header">
                            <a class="" href="#">
                                <img class="rb-perfil-img mr-2" src="{{asset('img/noimage.jpg')}}" alt="user">
                                <span class="">{{$post->user->name}}</span>
                            </a>

                            <small>| {{$post->created_at}}</small>
                        </div>
                        <div class="rb-post-body">
                            <p class="card-text">{{$post->body}}</p>
                        </div>
                        <div class="rb-post-footer">
                            <a href="#">Curtir</a>
                            <a href="#">Comentar</a>
                        </div>
                    </div>
                    @endforeach
                @else
                    <p>Nenhuma postagem no seu feed</p>
                @endif
            </div>
            <div class="col-3 card ml-3">
                <div class="card-body">
                    <h4>Cursos Ministrados</h4>
                </div>
            </div>
            <div class="col-3 card ml-3">
                <div class="card-body">
                    <h4>Inscrições</h4>
                </div>
            </div>
        </div>

    </div>

@endsection
