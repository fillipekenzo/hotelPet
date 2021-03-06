@extends('layouts.app')
@auth

@section('content')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <i class="fas fa-paw"></i>
            Pets
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('pet.create') }}" role="button">
                <i class="fas fa-fw fa-plus"></i> Novo
            </a>
        </div>
        <div class="card-body">
            <div class="row row-cols-1 row-cols-md-3 center">
                @foreach($pets as $pet)
                <div class="col mb-4 mx-auto" style="min-width:260px; max-width:260px;">
                    <div class="card h-100" id="linha">
                        <img src="{{$pet -> foto}}" class="card-img-top" style="max-height:120px;" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">{{ $pet->nome }}</h5>
                            <p class="card-text">
                                <b>ID:</b> {{$pet->id}} <br>
                                <b>Raça:</b> {{ $pet->raca }}<br>
                                <b>Peso:</b>{{ $pet->peso }} Kg<br>
                                <b>Tutor:</b>{{ $pet->tutor->nome }}<br>
                                <p id="status" hidden>{{ $pet->status}}</p>
                            </p>
                        </div>
                        <div class="card-footer " align="center">
                            <div class="mx-auto">
                                <a class="btn btn-primary btn-sm" href="{{ route('pet.show', ['pet' => $pet->id]) }}" role="button">
                                <i class="fas fa-fw fa-eye"></i>
                                </a>
                                @if(Auth::user()->tipoUsuario == 'admin')
                                <a class="btn btn-warning btn-sm" href="{{ route('pet.edit', ['pet' => $pet->id]) }}" role="button">
                                <i class="fas fa-fw fa-pencil-alt"></i>
                                </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <!-- <div class="col-md-12">
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
    </div> -->
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