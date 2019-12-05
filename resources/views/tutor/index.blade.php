@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <table class="table table-bordered table-responsive">
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

                <tr>
                    <th scope="row">{{ $tutor->id }}</th>
                    <td>{{ $tutor->nome }}</td>
                    <td>{{ $tutor->cpf }}</td>
                    <td>{{ $tutor->endereco }}</td>
                    <td>{{ $tutor->telefone }}</td>
                    <td>{{ $tutor->facebook }}</td>
                    <td>{{ $tutor->instagram }}</td>
                    <td>{{ $tutor->foto }}</td>
                    <td>{{ $tutor->status }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('tutor.show', ['tutor' => $tutor->id]) }}" role="button">Visualizar</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('tutor.edit', ['tutor' => $tutor->id]) }}" role="button">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection