@extends('layouts.app')
@section('content')
@auth
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-school"></i> Creches
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('creche.create') }}" role="button">
                <i class="fas fa-fw fa-plus"></i>Matricular novo Pet
            </a>
        </div>
        <div class="card-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead class="thead-light">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Pet</th>
                        <th scope="col">Func Resp.</th>
                        <th scope="col">Pacote Creche</th>
                        <th scope="col">Data</th>
                        <th scope="col">Observações</th>
                        <th scope="col">Status</th>
                        <th scope="col">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($creches as $creche)

                    <tr id="linha">
                        <th scope="row">{{ $creche->id }}</th>
                        <td>{{ $creche->pet->nome }}</td>
                        <td>{{ $creche->user->name}}</td>
                        <td>{{ $creche->pacoteCreche->descricao}}</td>
                        <td>{{ $creche->data }}</td>
                        <td>{{ $creche->observacoes }}</td>
                        <td id="status">{{ $creche->status }}</td>
                        <td>
                            <a class="btn btn-primary btn-sm" href="{{ route('creche.show', ['creche' => $creche->id]) }}" role="button">
                                <i class="fas fa-fw fa-eye"></i>
                            </a>
                            @if(Auth::user()->tipoUsuario == 'admin')
                            <a class="btn btn-warning btn-sm" href="{{ route('creche.edit', ['creche' => $creche->id]) }}" role="button">
                                <i class="fas fa-fw fa-pencil-alt"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" href="creche/finalizar/{{$creche->id}}" role="button">
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