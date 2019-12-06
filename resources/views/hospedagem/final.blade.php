@extends('layouts.app')
@section('content')
@auth
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('hospedagem.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i>Voltar
            </a>
            <i class="fas fa-home"></i> Hospedagem ID: {{$hospedagem -> id}} Finalizada com sucesso!!

        </div>
        <div class="card-body">
            <p><b>Pet </b>{{$hospedagem -> pet->nome}}</p>
            <p><b>Funcionario Responsável </b>{{$hospedagem -> user->name}}</p>
            <p><b>Data Entrada: </b>{{$hospedagem -> data_entrada}}</p>
            <p><b>Data Saida: </b>{{$hospedagem -> data_saida}}</p>
            <p><b>Valor Diária: </b>{{$hospedagem -> valor_diaria}}</p>
            <p><b>Dias hospedado: </b>{{$dias}}</p>
            <p><b>Valor Total: </b>R$ {{$hospedagem -> valor_total}}</p>
            <p><b>Status: </b>{{$hospedagem -> status}}</p>
        </div>

        <a class="btn btn-primary" href="{{ route('hospedagem.index') }}" role="button">Voltar</a>


    </div>
    @endauth

    @endsection