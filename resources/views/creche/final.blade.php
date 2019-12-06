@extends('layouts.app')
@section('content')
@auth
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('creche.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i>Voltar
            </a>
            <i class="fas fa-home"></i> Creche ID: {{$creche -> id}} Finalizada com sucesso!!

        </div>

    </div>
    <div class="card-body">
        <p><b>Pet </b>{{$creche -> pet->nome}}</p>
        <p><b>Data: </b>{{$creche -> data}}</p>
        <p><b>Observações: </b>{{$creche -> observacoes}}</p>
        <p><b>Status: </b>{{$creche -> status}}</p>
    </div>

    <a class="btn btn-primary" href="{{ route('creche.index') }}" role="button">Voltar</a>


</div>
@endauth

@endsection