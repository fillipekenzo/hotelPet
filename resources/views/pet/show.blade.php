@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('pet.index') }}" role="button">
                <i class="fas fa-fw fa-plus"></i> Voltar
            </a>
            <i class="fas fa-paw"></i>
            Pet: {{$pet -> nome}}
        </div>
        <div class="card-body">
            <p><b>Raça: </b>{{$pet -> raca}}</p>
            <p><b>Peso: </b>{{$pet -> peso}}</p>
            <p><b>Status: </b>{{$pet -> status}}</p>
            <p><b>Tutor Responsável: </b>{{$pet -> tutor->nome}}</p>

        </div>
        <form action="{{route('pet.destroy', $pet->id)}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <a class="btn btn-primary" href="{{ route('pet.index') }}" role="button">Voltar</a>
            <button class="btn btn-danger" type="submit">Deletar Pet: {{$pet->nome}}</button>
        </form>
    </div>
</div>
    @endsection