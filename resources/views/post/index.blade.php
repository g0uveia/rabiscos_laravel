@extends('layout')

@section('head')
    <script>
        function tagListItem(value, url, img) {
            return '<li><a href="' + url + '"><img class="rounded-circle" style="max-width: 1.5rem; margin-right:.5rem" src="' + img + '" alt="" /><small style="line-height:2rem;">@' + value + '</small></a></li>';
        }
    </script>
@endsection

@section('conteudo')
    <div class="row">
        <div class="col-md-8">
            @include('inc.messages')
            @include('post.create')

            <section class="mt-5">
                @if(count($posts) > 0)
                    @foreach ($posts as $post)
                        <div class="card <?php if(!$loop->last) echo 'mb-4' ?> rb-post" data-postId="{{$post->id}}">
                            <div class="rb-post-header">
                                <a class="" href="{{route("user", ['id' => $post->user])}}">
                                    <img class="rb-perfil-img mr-2" src="{{Storage::url($post->user->img_path)}}" alt="user">
                                    <span class="">{{$post->user->name}}</span>
                                </a>

                                <small>| {{$post->created_at->format('d \d\e M Y \à\s h:m')}}</small>
                            </div>
                            <div class="rb-post-body">
                                <p class="card-text">{{$post->body}}</p>
                            </div>
                            <div class="rb-post-footer">
                                <span class="rb-like">
                                    <a href="#" class="rb-like-button">
                                        <i class="material-icons align-middle medium {{ count(Auth::user()->likes->where('post_id', $post->id)) == 0 ? 'text-muted' : '' }}">
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
                                    @if (count($post->likes) > 0)
                                        <div class="rb-post-like-list card">
                                            <div class="card-body">
                                                <ul>
                                                    @foreach ($post->likes as $like)
                                                        <script>
                                                        console.log('{{Storage::url($like->user->img_path)}}');
                                                            document.write(tagListItem('{{$like->user->username}}', '{{route("user", ['id' => $like->user])}}', '{{Storage::url($like->user->img_path)}}'));
                                                        </script>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                    @endif
                                </span>
                                <a href="#"><i class="material-icons align-middle text-muted">chat_bubble_outline</i></a>
                            </div>
                        </div>
                    @endforeach
                @else
                    <p>Nenhuma postagem no seu feed</p>
                @endif
            </section>

        </div>
    </div>

    <script>
        var token = '{{ Session::token() }}';
        var urlLike = '{{ route('like') }}';
        var urlGetLikes = '{{ route('get_like') }}';
    </script>

@endsection
