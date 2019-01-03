@extends('layout_1')

@section('conteudo')

    <form method="POST" action="{{ route('register') }}">
        @csrf
        <div class="form-group mb-4">
            <h2 class="rb-logo">Mundo do Rabisco</h2>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend rb-input-append">
                    <span class="input-group-text"><i class="material-icons">alternate_email</i></span>
                </div>
                <input id="username" type="text" placeholder="Nome de usuário" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" name="username" required>
                @if ($errors->has('username'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('username') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend rb-input-append">
                    <span class="input-group-text"><i class="material-icons">person</i></span>
                </div>
                <input id="name" type="text" placeholder="Nome" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('name') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend rb-input-append">
                    <span class="input-group-text"><i class="material-icons">email</i></span>
                </div>
                <input id="email" type="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend rb-input-append">
                    <span class="input-group-text"><i class="material-icons">lock</i></span>
                </div>
                <input id="password" type="password" placeholder="Senha" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                @endif
            </div>
        </div>

        <div class="form-group">
            <div class="input-group">
                <div class="input-group-prepend rb-input-append">
                    <span class="input-group-text"><i class="material-icons">lock</i></span>
                </div>
                <input id="password-confirm" type="password" placeholder="Confirmar senha" class="form-control" name="password_confirmation" required>
            </div>
        </div>

        <div class="mt-4">
            <input type="submit" class="btn btn-primary form-control" value="Registrar">
        </div>

        <div class="mt-2">
            <a href="{{route('login')}}" class="btn btn-secondary form-control">Voltar</a>
        </div>
    </form>
@endsection
