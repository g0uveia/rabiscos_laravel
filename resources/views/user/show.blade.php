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
                    <div class="card-body text-center rb-profile-link">
                        <div class="w-100">
                            <img class="rounded-circle mb-4" height="150" width="150" src="{{Storage::url($user->img_path)}}" alt="">
                            <h4 class="mb-0">{{$user->name}}</h4>
                            <small class="rb-profile-username">{{$user->username}}</small>
                            <hr class="mb-3">
                            <span class="d-inline-block mt-1 more">{{$user->bio}}</span>
                        </div>
                    </div>
                    @if ($has_edit_permission)
                        <div class="card-footer text-center">
                            <a class="btn btn-secondary" href="{{ route("user.edit", $user->username) }}">Editar Perfil</a>
                        </div>
                    @endif
                </div>
            </div>
            <div class="col-9">
                <div class="card rb-cardt-profile">
                    <div class="card-body">
                        <div class="w-100">
                            <h3 class="pb-2">Portifólios</h3>
                            @if($has_portfolios)
                                <div class="row">
                                @foreach  ($user->portfolios->sortByDesc('created_at')->take(3) as $portfolio)
                                    <div class="col-4">
                                        <a href="{{route("portfolio", $portfolio->id)}}">
                                            <div class="card">
                                                <img class="card-img-top rb-img-portfolio" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                                <div class="card-body">
                                                    <h5 class="card-title mb-1">{{$portfolio->titulo}}
                                                    <h6><small class="card-subtitle text-muted">Ultima modificação: {{$portfolio->updated_at->format('d M Y')}}</small></h6>
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
                    @if ($has_edit_permission || $has_portfolios)
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
        <div class="row">
            <div class="col-4">
                <div class="card rb-feed-profile rb-cardb-profile">
                    @if(count($user->posts) > 0)
                        @foreach  ($user->posts->sortByDesc('created_at') as $post)
                        <div data-postId="{{$post->id}}">
                            <div class="rb-post-header">
                                <a class="rb-link-user-post" href="#">
                                    <img class="rb-perfil-img" src="{{Storage::url($user->img_path)}}" alt="user">
                                    <span class="">
                                        {{$post->user->name}}
                                        <br><small>{{$post->created_at->format('d F \à\s h:m')}}</small>
                                    </span>
                                </a>
                            </div>
                            <div class="rb-post-body">
                                <p class="card-text">{{$post->body}}</p>
                            </div>
                            <div class="rb-post-footer rb-post-footer-perfil">
                                <a href="#" class="rb-like-button">
                                    <i class="material-icons align-middle medium text-muted">
                                        {{ count(Auth::user()->likes->where('post_id', $post->id)) == 0 ? 'favorite_border' : 'favorite'}}
                                    </i>
                                    <span>
                                        <?php
                                            $num_likes = count($post->likes);
                                            if ($num_likes > 0) {
                                                echo '<small class="align-middle text-muted">'. $num_likes .'</small>';
                                            }
                                        ?>
                                    </span>
                                </a>
                                <a href="#"><i class="material-icons align-middle text-muted">chat_bubble_outline</i></a>
                            </div>
                        </div>
                        @if (!$loop->last || ($loop->first && !$loop->last))
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


<script>
    var token = '{{ Session::token() }}';
    var urlLike = '{{ route('like') }}';
    var urlGetLikes = '{{ route('get_like') }}';
</script>
@endsection
