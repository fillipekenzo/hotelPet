@extends('layouts.app')
@section('content')

@auth
@switch(Auth::user()->tipoUsuario)
@case('admin')

<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('hospedagem.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i>Voltar
            </a>
            <i class="fas fa-home"></i> Registrar Hospedagem

        </div>
        <div class="card-body">
            <form action="{{route('hospedagem.store')}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputData">Data Entrada:</label>
                        <input type="date" class="form-control" id="inputData" name="data_entrada">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control" name="status">
                            <option value="ativo" selected>Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    <div class="form-group col-md-4">
                        <label for="pet_id">Pet</label>
                        <select name="pet_id" class="form-control">
                            @foreach( $pets as $pet )
                            <option value="{{ $pet->id }}">{{ $pet->nome }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputData">Valor Diária:</label>
                        <input type="number" step="any" class="form-control" id="inputData" name="valor_diaria">
                    </div>
                    <div class="form-group col-md-8">
                        <label for="inputObservacoes">Observações:</label>
                        <textarea class="form-control" id="inputObservacoes" rows="3" name="observacoes"></textarea>
                    </div>
                </div>
        </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>

@break
@case('func')
Voce não tem permissão!
@break
@endswitch
@else
<a href="{{ route('login') }}">Login</a>
@endauth
@endsection