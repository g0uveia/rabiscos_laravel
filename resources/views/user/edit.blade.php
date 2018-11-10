@extends('layout')

@section('conteudo')
    @if ($errors->any())
        <div class="alert alert-danger">
            @foreach ($errors->all() as $error)
                <span>{{ $error }}</span><br>
            @endforeach
        </div>
    @endif

    <div class="row">
        <div class="col-10">
            <div class="card">
                <div class="card-body">
                    <div class="container">
                        <h2 class="mb-4">Editar Perfil</h2>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <div class="container text-center">
                                {!! Form::open(['action' => ['UserController@update', $user->username], 'method' => 'POST', 'files' => 'true']) !!}
                                    <label id="rb-profile-label-add-img" for="rb-profile-add-img">
                                        <div id="rb-profile-cover" class="rounded-circle text-center">
                                            <div class="px-4">
                                                <i class="material-icons">add_a_photo</i><br>
                                                <span>Alterar avatar do perfil</span>
                                            </div>
                                        </div>
                                        <img id="rb-profile-showimg" class="img-fluid rounded-circle" src="{{Storage::url($user->img_path)}}" alt="">
                                        {{Form::file('image', ['style' => 'display:none', 'id' => 'rb-profile-add-img'])}}
                                    </label>
                            </div>
                        </div>
                        <div class="col-8">
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Nome:</label>
                                        {{ Form::text('name', $user->name, ['class' => 'form-control', 'autofocus', 'maxLength' => 191]) }}
                                    </div>
                                    <div class="form-group">
                                        <label for="bio">Bio:</label>
                                        {{ Form::textarea('bio', $user->bio, ['class' => 'form-control', 'rows' => 3]) }}
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="username">Username:</label>
                                        {{ Form::text('username', $user->username, ['class' => 'form-control', 'maxLength' => 191]) }}

                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        {{ Form::email('email', $user->email, ['class' => 'form-control', 'maxLength' => 191]) }}

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="text-right">
                        <a href="{{route('user', $user->username)}}" class="btn btn-secondary">Voltar</a>
                        {{ Form::hidden('_method', 'PUT') }}
                        {{ Form::submit('Salvar alterações', ['class' => 'btn btn-primary ml-2'])}}
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
