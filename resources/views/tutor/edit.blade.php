@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <form action="{{route('tutor.update', ['tutor' => $tutor -> id])}}" class="form-horizontal" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="inputNome">Nome:</label>
                <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="{{old('nome', $tutor -> nome)}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCpf">CPF:</label>
                    <input type="number" class="form-control" id="inputCpf" placeholder="CPF" name="cpf" value="{{old('cpf', $tutor -> cpf)}}">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTelefone">Telefone:</label>
                    <input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" name="telefone" value="{{old('telefone', $tutor -> telefone)}}">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEndereco">Endereço:</label>
                <input type="text" class="form-control" id="inputEndereco" placeholder="Endereço" name="endereco" value="{{old('endereco', $tutor -> endereco)}}">
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputFacebook">Facebook</label>
                    <input type="text" class="form-control" id="inputFacebook" name="facebook" value="{{old('facebook', $tutor -> facebook)}}">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputInstagram">Instagram</label>
                    <input type="text" class="form-control" id="inputInstagram" name="instagram" value="{{old('instagram', $tutor -> instagram)}}">
                   
                </div>
                <div class="form-group col-md-2">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status" value="{{old('status', $tutor -> status)}}">
                        <option value="ativo">Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
</div>
@endsection