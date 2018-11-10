@extends('layout')

@section('conteudo')
    <div>
        <img id="image" src="{{asset('img/noimage.jpg')}}" alt="" />
    </div>
    <form action="">
        <input type="file" name="img" id="img">
    </form>

    <style>
        #image {
            width: 300px;
        }
    </style>
@endsection
