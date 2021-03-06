@extends('layouts.app')
@section('content')

@auth
@switch(Auth::user()->tipoUsuario)
@case('admin')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('pet.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i> Voltar
            </a>
            <i class="fas fa-paw"></i>
            Cadastrar Pet

        </div>
        <div class="card-body">
            <form action="{{route('pet.store')}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome:</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFoto">Escolha a foto do pet</label>
                        <input type="file" class="form-control-file" id="inputFoto" name="foto">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                        <label for="inputRaca">Raça:</label>
                        <input type="text" class="form-control" id="inputRaca" placeholder="Raça" name="raca">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputPeso">Peso:</label>
                        <input type="number" step="any" class="form-control" id="inputPeso" placeholder="Peso" name="peso">
                    </div>
                    <div class="form-group col-md-4">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control" name="status">
                            <option value="ativo" selected>Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="tutor_id">Tutor Responsável</label>
                        <select name="tutor_id" class="form-control">
                            @foreach( $tutors as $tutor )
                            <option value="{{ $tutor->id }}">{{ $tutor->nome }}</option>
                            @endforeach
                        </select>
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