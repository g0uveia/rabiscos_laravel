@if($has_portfolios)
    <div class="row">
    @foreach  ($user->portfolios->sortByDesc('created_at') @yield('take') as $portfolio)
        <div class="col-4">
            <div class="card">
                <img class="card-img-top rb-img-portfolio" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                <div class="card-body">
                    <h5 class="card-title mb-1">{{$portfolio->titulo}}
                    <h6><small class="card-subtitle text-muted">Ultima modificação: {{$portfolio->updated_at}}</small></h6>
                    <p class="card-text rb-more-portfolio">{{$portfolio->descricao}}</p>
                </div>
            </div>
        </div>
    @endforeach
    </div>
@else
    <p class="card-text text-muted">Esse usuário ainda não possui portifólios</p>
@endif
