@extends('layout')
@section('conteudo')
<?php
    $has_edit_permission = Auth::id() == $user->username;
    $has_portfolios = count($user->portfolios) > 0;
?>
<div class="row">
    <div class="col-10">
        <div class="row rb-profilet">
            <div class="col-3">
                <div class="card rb-cardt-profile rb-info-profile">
                    <div class="card-body text-center">
                        <div class="rb-profile-link">
                          <a href="{{route("user", ['username' => $user->username])}}">
                            <img class="px-3 img-fluid rounded-circle mb-4" src="{{asset('img/noimage.jpg')}}" alt="">
                            <h4>{{$user->name}}</h4>
                            <hr class="mb-3">
                          </a>
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
                                    <div class="col-4" style="margin-top: 15px;">
                                        <div class="card rb-portfolio">
                                            <a href="#">
                                                <img class="card-img-top rb-img-portfolio" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title">{{$portfolio->titulo}}</h5>
                                                    <p class="card-text rb-more-portfolio">{{$portfolio->descricao}}</p>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                @endforeach
                                </div>
                            @else
                                <p class="card-text text-muted">Esse usuário ainda não possui portifólios</p>
                            @endif
                        </div>
                    </div>

                        <div class="card-footer">
                            <div class="text-right">
                                @if ($has_edit_permission)
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalportfolio">
                                        Criar Portifólio
                                    </button>
                                @endif
                            </div>
                        </div>
                        @include('portfolio.create')
                </div>
            </div>
        </div>
      </div>
    </div>
@endsection
