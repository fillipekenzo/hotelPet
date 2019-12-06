@extends('layouts.app')
@section('content')
@auth

<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
        <a class="btn btn-success btn-sm ml-auto" href="{{ route('tutor.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i> Voltar
            </a>
            <i class="fas fa-user-shield"></i>
            Tutor: {{$tutor -> nome}}
        </div>
        <div class="card-body">
            <p><b>CPF: </b>{{$tutor -> cpf}}</p>
            <p><b>Telefone: </b>{{$tutor -> telefone}}</p>
            <p><b>Endereço: </b>{{$tutor -> endereco}}</p>
            <p><b>Instagram: </b>{{$tutor -> instagram}}</p>
            <p><b>Facebook: </b>{{$tutor -> facebook}}</p>
            <p><b>Status: </b>{{$tutor -> status}}</p>
        </div>
        <form action="{{route('tutor.destroy', $tutor->id)}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <a class="btn btn-primary" href="{{ route('tutor.index') }}" role="button">Voltar</a>
            @if(Auth::user()->tipoUsuario == 'admin')
            <button class="btn btn-danger" type="submit">Deletar Tutor: {{$tutor->nome}}</button>
            @endif
        </form>

    </div>
</div>
    @endauth
    @endsection