@extends('layouts.app')

@section('content')
<div class="container">
    <div class="bd-example">

    </div>
    <div class="row row-cols-1 row-cols-md-3 center">
        @foreach($pets as $pet)
        <div class="col mb-4 mx-auto" style="min-width:260px; max-width:260px;">
            <div class="card h-100 border-success">
                <img src="{{$pet -> foto}}" class="card-img-top" style="max-height:120px;" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{ $pet->nome }}</h5>
                    <p class="card-text">
                        <b>ID:</b> {{$pet->id}} <br>
                        <b>Raça:</b> {{ $pet->raca }}<br>
                        <b>Peso:</b>{{ $pet->peso }}<br>
                        <b>Tutor:</b>{{$pet->tutor->nome }}<br>
                    </p>
                </div>
                <div class="card-footer">
                    <div class="mx-auto">
                        <a class="btn btn-primary btn-sm" href="{{ route('pet.show', ['pet' => $pet->id]) }}" role="button">Visualizar</a>
                        <a class="btn btn-warning btn-sm" href="{{ route('pet.edit', ['pet' => $pet->id]) }}" role="button">Editar</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>

    <div class="col-md-12">



        <table class="table table-bordered table-responsive">
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