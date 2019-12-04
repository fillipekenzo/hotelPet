@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <form action="{{route('pet.update', ['pet' => $pet -> id])}}" class="form-horizontal" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputNome">Nome:</label>
                <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputRaca">Raça:</label>
                    <input type="text" class="form-control" id="inputRaca" placeholder="Raça" name="raca">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputPeso">Peso:</label>
                    <input type="number" class="form-control" id="inputPeso" placeholder="Peso" name="peso">
                </div>
                <div class="form-group col-md-4">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status">
                        <option value="ativo" selected>Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection