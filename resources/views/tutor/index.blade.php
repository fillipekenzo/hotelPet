@extends('layouts.app')

@section('content')
@auth
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-user-shield"></i>
            Tutores
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('tutor.create') }}" role="button">
                <i class="fas fa-fw fa-plus"></i> Novo
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nome</th>
                            <th scope="col">CPF</th>
                            <th scope="col">Endereço</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Facebook</th>
                            <th scope="col">Instagram</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Status</th>
                            <th scope="col">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tutores as $tutor)

                        <tr id="linha" class="@if($tutor->status == 'ativo')
                                                ativo
                                            @else
                                                inativo
                                            @endif" >
                            <th scope="row">{{ $tutor->id }}</th>
                            <td>{{ $tutor->nome }}</td>
                            <td>{{ $tutor->cpf }}</td>
                            <td>{{ $tutor->endereco }}</td>
                            <td>{{ $tutor->telefone }}</td>
                            <td>{{ $tutor->facebook }}</td>
                            <td>{{ $tutor->instagram }}</td>
                            <td>{{ $tutor->foto }}</td>
                            <td id="status">{{ $tutor->status }}</td>
                            <td>
                                <a class="btn btn-primary btn-sm" href="{{ route('tutor.show', ['tutor' => $tutor->id]) }}" role="button">
                                    <i class="fas fa-fw fa-eye"></i>
                                </a>
                                @if(Auth::user()->tipoUsuario == 'admin')
                                <a class="btn btn-warning btn-sm" href="{{ route('tutor.edit', ['tutor' => $tutor->id]) }}" role="button">
                                    <i class="fas fa-fw fa-pencil-alt"></i>
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