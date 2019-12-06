@extends('layouts.app')
@section('content')
@auth
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('hospedagem.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i>Voltar
            </a>
            <i class="fas fa-home"></i> ID: {{$hospedagem -> id}}

        </div>
        <div class="card-body">
            <p><b>Pet </b>{{$hospedagem -> pet->nome}}</p>
            <p><b>Funcionario Responsável </b>{{$hospedagem -> user->name}}</p>
            <p><b>Data Entrada: </b>{{$hospedagem -> data_entrada}}</p>
            <p><b>Data Saida: </b>{{$hospedagem -> data_saida}}</p>
            <p><b>Valor Diária: </b>{{$hospedagem -> valor_diaria}}</p>
            <p><b>Valor Total: </b>{{$hospedagem -> valor_total}}</p>
            <p><b>Observações: </b>{{$hospedagem -> observacoes}}</p>
            <p><b>Status: </b>{{$hospedagem -> status}}</p>
        </div>
        <form action="{{route('hospedagem.destroy', $hospedagem->id)}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <a class="btn btn-primary" href="{{ route('hospedagem.index') }}" role="button">Voltar</a>
            @if(Auth::user()->tipoUsuario == 'admin')
            <button class="btn btn-danger" type="submit">Deletar Hospedagem: {{$hospedagem->id}}</button>
            @endif
        </form>

    </div>
    @endauth

    @endsection