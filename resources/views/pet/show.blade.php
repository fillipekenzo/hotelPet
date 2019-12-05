@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <h1 class="h1">Pet: {{$pet -> nome}}</h1>
        <p><b>Raça: </b>{{$pet -> raca}}</p>
        <p><b>Peso: </b>{{$pet -> peso}}</p>
        <p><b>Status: </b>{{$pet -> status}}</p>
        <p><b>Tutor Responsável: </b>{{$pet -> tutor->nome}}</p>

    </div>
    <form action="{{route('pet.destroy', $pet->id)}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <a class="btn btn-primary" href="{{ route('pet.index') }}" role="button">Voltar</a>
        <button class="btn btn-danger" type="submit" >Deletar Pet: {{$pet->nome}}</button>
    </form>
    
</div>

@endsection