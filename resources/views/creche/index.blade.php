@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Pet</th>
                    <th scope="col">Funcionario Responsável</th>
                    <th scope="col">Data</th>
                    <th scope="col">Observações</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($creches as $creche)

                <tr>
                    <th scope="row">{{ $creche->id }}</th>
                    <td>{{ $creche->pet->nome }}</td>
                    <td>{{ $creche->user->name}}</td>
                    <td>{{ $creche->data }}</td>
                    <td>{{ $creche->observacoes }}</td>
                    <td>{{ $creche->status }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('creche.show', ['creche' => $creche->id]) }}" role="button">Visualizar</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('creche.edit', ['creche' => $creche->id]) }}" role="button">Editar</a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>

@endsection