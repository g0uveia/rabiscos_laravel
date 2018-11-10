@extends('layout')
@section('conteudo')
<?php
    $has_edit_permission = Auth::id() == $user->username;
    $has_portfolios = count($user->portfolios) > 0;
?>
<div class="row">
    <div class="col-10">
        <div class="row rb-profilet">
            <div class="col-3 rb-profile-link">
                <div class="card rb-cardt-profile rb-info-profile">
                    <div class="card-body text-center">
                        <div>
                            <img class="px-3 img-fluid rounded-circle mb-4" src="{{Storage::url($user->img_path)}}" alt="">
                            <h4 class="mb-0">{{$user->name}}</h4>
                            <small class="rb-profile-username">{{$user->username}}</small>
                            <hr class="mb-3">
                            <span class="d-inline-block mt-1 more">{{$user->bio}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-9">
                <div class="card rb-cardt-profile">
                    <div class="card-body">
                        <div class="w-100">
                            <h3 class="pb-2">Portifólios</h3>
                            @if($has_portfolios)
                                <div class="row">
                                @foreach  ($user->portfolios->sortByDesc('created_at') as $portfolio)
                                    <div class="col-4">
                                        <a href="{{route("portfolio", $portfolio->id)}}">
                                            <div class="card">
                                                <img class="card-img-top rb-img-portfolio" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-1">{{$portfolio->titulo}}
                                                    <h6><small class="card-subtitle text-muted">Ultima modificação: {{$portfolio->updated_at}}</small></h6>
                                                    <p class="card-text rb-more-portfolio">{{$portfolio->descricao}}</p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                @endforeach
                                </div>
                            @else
                                <p class="card-text text-muted">Esse usuário ainda não possui portifólios</p>
                            @endif
                        </div>
                    </div>

                    @if ($has_edit_permission)
                        <div class="card-footer">
                            <div class="text-right">
                                    <a href="{{route('user', $user->username)}}" class="btn btn-secondary">Voltar</a>
                                    <button type="button" class="btn btn-primary ml-2" data-toggle="modal" data-target="#modalPortfolio">
                                        Criar Portifólio
                                    </button>
                            </div>
                        </div>
                        @include('portfolio.create')
                    @endif
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
