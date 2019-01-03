@extends('layout_1')

@section('conteudo')

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group mb-4 text-center">
            <h2>Mundo do Rabisco</h2>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <div class="input-group">
                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group mb-4">
            <label for="password">Senha:</label>
            <div class="input-group">
                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>
                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group pb-1">
            <input type="submit" class="btn btn-primary form-control" value="Entrar" />
        </div>

        <hr class="my-4">

        <div class="text-center">
            <span>
                Não possui uma conta?
                <a href="{{route('register')}}">
                    {{__('Fazer cadastro')}}
                </a>
            </span>
        </div>
    </form>

@endsection
