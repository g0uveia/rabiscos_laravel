
{!! Form::open(['action' => 'PostsController@store', 'method' => 'POST']) !!}
    {{Form::textarea('post_text', '', ['class' => 'form-control', 'placeholder' => 'Compartilhe algo com seus seguidores...', 'rows' => '5', 'required'])}}
    <div class="d-flex justify-content-end">
        {{Form::submit('Publicar', ['class' => 'btn btn-primary mt-2'])}}
    </div>
{!! Form::close() !!}
