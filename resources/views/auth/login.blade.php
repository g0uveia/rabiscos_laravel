@extends('layout_1')

@section('conteudo')
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">
                    <div class="card cardoso px-4">
                        <div class="card-body py-5">
                            <form method="POST" action="{{ route('login') }}">
                                @csrf

                                <div class="form-group">
                                    <label for="email">{{ __('E-Mail') }}</label>

                                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                                    @if ($errors->has('email'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group">
                                    <label for="password">{{ __('Senha') }}</label>

                                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                                    @if ($errors->has('password'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>

                                <div class="form-group mt-4">
                                    <input type="submit" class="btn btn-primary form-control" value="{{ __('Entrar') }}" />
                                </div>

                                <hr class="my-4">

                                <div class="text-center">
                                    <span class="d-inline-block">
                                        Não possui uma conta?
                                        <a href="{{route('register')}}">
                                            {{__('Fazer cadastro')}}
                                        </a>
                                    </span>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
