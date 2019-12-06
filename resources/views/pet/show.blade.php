@extends('layouts.app')
@section('content')

@auth

<div class="container">
    <div class="col-md-12">
        <h1 class="h1">Nome: {{$pet -> id}}</h1>
        <p><b>Raça </b>{{$pet -> raca}}</p>
        <p><b>Peso: </b>{{$pet -> peso}}</p>
        <p><b>Foto: </b>{{$pet -> foto}}</p>
        <p><b>Status: </b>{{$pet -> status}}</p>
    </div>
    <form action="{{route('pet.destroy', $pet->id)}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <a class="btn btn-primary" href="{{ route('pet.index') }}" role="button">Voltar</a>
        @if(Auth::user()->tipoUsuario == 'admin')
        <button class="btn btn-danger" type="submit" >Deletar Pet: {{$pet->id}}</button>
        @endif
    </form>
    
</div>
@endauth
@endsection