@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <form action="{{route('pet.update', ['pet' => $pet -> id])}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputNome">Nome:</label>
                    <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="{{old('nome', $pet -> nome)}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFoto">Escolha a foto do pet</label>
                    <input type="file" class="form-control-file" id="inputFoto" name="foto" value="{{old('foto', $pet -> foto)}}">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputRaca">Raça:</label>
                    <input type="text" class="form-control" id="inputRaca" placeholder="Raça" name="raca" value="{{old('raca', $pet -> raca)}}">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPeso">Peso:</label>
                    <input type="number" class="form-control" id="inputPeso" placeholder="Peso" name="peso" value="{{old('peso', $pet -> peso)}}">
                </div>
                @if($pet->status == "ativo")
                <div class="form-group col-md-4">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status">
                        <option value="ativo" selected>Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
                @else
                <div class="form-group col-md-4">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status">
                        <option value="ativo">Ativo</option>
                        <option value="inativo" selected>Inativo</option>
                    </select>
                </div>
                @endif

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="tutor_id">Tutor Responsável</label>
                    <select name="tutor_id" class="form-control">
                        @foreach( $tutors as $tutor )
                        <option value="{{ $tutor->id }}" @if($tutor->id === $pet->tutor_id)
                            selected
                            @endif>
                            {{ $tutor->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection