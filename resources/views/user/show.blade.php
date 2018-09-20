@extends('layout')

@section('conteudo')

@include('inc.messages')
<?php
    $has_edit_permission = Auth::id() == $user->username;
    $has_portfolios = count($user->portfolios) > 0;
    $has_more_portfolios = count($user->portfolios) > 3;
?>

<div class="row">
    <div class="col-10">
        <div class="row rb-profilet">
            <div class="col-3">
                <div class="card rb-cardt-profile rb-info-profile">
                    <div class="card-body text-center">
                        <div>
                            <img class="px-3 img-fluid rounded-circle mb-4" src="{{asset('img/noimage.jpg')}}" alt="">
                            <h4>{{$user->name}}</h4>
                            <hr class="mb-3">
                            <span class="more">{{$user->bio}}</span>
                        </div>
                    </div>
                    @if ($has_edit_permission)
                        <div class="card-footer text-center">
                            <a class="btn btn-secondary" href="{{$user->username}}/edit">Editar Perfil</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-9">
                <div class="card rb-cardt-profile">
                    <div class="card-body">
                        <div class="w-100">
                            <h3 class="pb-2">Portifólios</h3>

                        </div>
                    </div>
                    @if ($has_edit_permission || $has_more_portfolios)
                        <div class="card-footer">
                            <div class="text-right">
                                @if ($has_edit_permission)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPortfolio">
                                        Criar Portifólio
                                    </button>
                                @endif
                                @if ($has_portfolios)
                                    <a class="btn btn-secondary ml-2" href="{{route('user.portfolios', ['username' => $user->username])}}">Ver todos...</a>
                                @endif
                            </div>
                        </div>
                        @include('portfolio.create')
                    @endif
                </div>
            </div>
        </div>
        <div class="row mb-5">
            <div class="col-4">
                <div class="card rb-feed-profile rb-cardb-profile">
                    @if(count($user->posts) > 0)
                        @foreach  ($user->posts as $post)
                        <div>
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
                        @if (!$loop->last || $loop->first)
                            <hr>
                        @endif
                        @endforeach
                    @else
                        <div class="card-body">
                            <p class="card-text text-muted">Esse usuário ainda não fez postagens</p>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-4">
                <div class="card rb-cardb-profile">
                    <div class="card-body">
                        <h4 class="pb-1">Inscrições</h4>
                        <p class="card-text text-muted">Esse usuário ainda não se inscreveu em nenhum curso</p>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card rb-cardb-profile">
                    <div class="card-body">
                        <h4 class="pb-1">Cursos Ministrados</h4>
                        <p class="card-text text-muted">Esse usuário ainda não publicou nenhum curso</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


</div>

@endsection
