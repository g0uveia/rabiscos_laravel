@extends('layout')

@section('conteudo')
    <div class="row">
        <div class="col-md-10">
            <section class="bg-white">
                <header>
                    <img class="rb-portfolio-header-img" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                </header>
                <section>
                    <div class="rb-portfolio-box-info pt-5 pb-4">
                        <h2>{{$portfolio->titulo}}</h2>
                        <p>{{$portfolio->descricao}}</p>
                        <div class="btn-group rb-portfolio-control-displaymode pt-2" role="group">
                            <button class="btn btn-secondary active" type="button">
                                <i class="material-icons align-middle">view_module</i>
                                <span class="align-middle">Ver grade</span>
                            </button>
                            <button class="btn btn-secondary" type="button">
                                <i class="material-icons align-middle">view_list</i>
                                <span class="align-middle">Ver lista</span>
                            </button>
                        </div>
                    </div>
                    <div class="portfolio-display px-4 py-4">
                        <div class="row pb-4">
                            <div class="col-md-4">
                                <div class="rb-portfolio-box-img">
                                    <img class="img-responsive" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="rb-portfolio-box-img">
                                    <img class="img-responsive" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="rb-portfolio-box-img">
                                    <img class="img-responsive" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="rb-portfolio-box-img">
                                    <img class="img-responsive" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="rb-portfolio-box-img">
                                    <img class="img-responsive" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="rb-portfolio-box-img">
                                    <img class="img-responsive" src="{{asset('img/no-image-portfolio.jpg')}}" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>

@endsection
