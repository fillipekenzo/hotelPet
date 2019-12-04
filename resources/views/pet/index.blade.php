@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Raça</th>
                    <th scope="col">Peso</th>
                    <th scope="col">Foto</th>
                    <th scope="col">Status</th>
                    <th scope="col">Tutor</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($pets as $pet)
                <tr>
                    <th scope="row">{{ $pet->id }}</th>
                    <td>{{ $pet->nome }}</td>
                    <td>{{ $pet->raca }}</td>
                    <td>{{ $pet->peso }}</td>
                    <td>{{ $pet->foto }}</td>
                    <td>{{ $pet->status }}</td>
                    <td>{{ $pet->tutor->nome }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('pet.show', ['pet' => $pet->id]) }}" role="button">Visualizar</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('pet.edit', ['pet' => $pet->id]) }}" role="button">Editar</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection