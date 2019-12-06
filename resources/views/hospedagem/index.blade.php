@extends('layouts.app')
@section('content')

@auth
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-home"></i> Hospedagens
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('hospedagem.create') }}" role="button">
                <i class="fas fa-fw fa-plus"></i>Registrar nova hospedagem
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Data Entrada:</th>
                        <th scope="col">Data Saida:</th>
                        <th scope="col">Observações</th>
                        <th scope="col">Pet:</th>
                        <th scope="col">Funcionario Responsável:</th>
                        <th scope="col">Valor Diária:</th>
                        <th scope="col">Valor Total:</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hospedagens as $hospedagem)

                    <tr id="linha">
                        <th scope="row">{{ $hospedagem->id }}</th>
                        <td>{{ $hospedagem->data_entrada }}</td>
                        <td>{{ $hospedagem->data_saida }}</td>
                        <td>{{ $hospedagem->observacoes }}</td>
                        <td>{{ $hospedagem->pet->nome}}</td>
                        <td>{{ $hospedagem->user->name}}</td>
                        <td>{{ $hospedagem->valor_diaria }}</td>
                        <td>{{ $hospedagem->valor_total }}</td>
                        <td id="status">{{ $hospedagem->status }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('hospedagem.show', ['hospedagem' => $hospedagem->id]) }}" role="button">
                                <i class="fas fa-fw fa-eye"></i>
                            </a>
                            @if(Auth::user()->tipoUsuario == 'admin')
                            <a class="btn btn-warning btn-sm" href="{{ route('hospedagem.edit', ['hospedagem' => $hospedagem->id]) }}" role="button">
                                <i class="fas fa-fw fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="hospedagem/finalizar/{{$hospedagem->id}}" role="button">
                                <i class="fas fa-fw fa-times"></i>
                            </a>

                            @endif
                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>
</div>
<script>
var status = document.getElementById('status').innerHTML;
if(status == 'ativo'){
    document.getElementById('linha').setAttribute('class','ativo');
}else{
    document.getElementById('linha').setAttribute('class','inativo');
}
</script>
@else
<a href="{{ route('login') }}">Login</a>
@endauth
@endsection