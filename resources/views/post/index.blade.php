@extends('layout')

@section('conteudo')
    <div class="row">
        <div class="col-md-8">
            @include('inc.messages')
            @include('post.create')

            <section class="mt-5">
                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="card mb-4 rb-post">
                            <div class="rb-post-header">
                                <a class="" href="{{route("user", ['id' => $post->user])}}">
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
            </section>

        </div>
    </div>
@endsection