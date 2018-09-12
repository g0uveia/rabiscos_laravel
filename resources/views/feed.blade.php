@extends('layout')

@section('conteudo')
    <div class="row">
        <div class="col-8">
            @include('inc.messages')
            @include('inc.postbox')

            <section class="mt-5">
                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="card mb-4">
                            <div class="card-header bg-light">
                                <a class="" href="#">
                                    <img class="rb-perfil-img mr-2" src="{{asset('img/noimage.jpg')}}" alt="user">
                                    <span class="">Nome de usuário</span>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text">{{$post->body}}</p>
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
