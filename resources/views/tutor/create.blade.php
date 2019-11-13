@extends('layouts.app')
@section('content')
<div class="container">
    <div class="col-md-12">
        <form action="{{route('tutor.store')}}" class="form-horizontal" method="POST">
            @csrf
            <div class="form-group">
                <label for="inputNome">Nome:</label>
                <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputCpf">CPF:</label>
                    <input type="number" class="form-control" id="inputCpf" placeholder="CPF" name="cpf">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputTelefone">Telefone:</label>
                    <input type="text" class="form-control" id="inputTelefone" placeholder="Telefone" name="telefone">
                </div>
            </div>
            <div class="form-group">
                <label for="inputEndereco">Endereço:</label>
                <input type="text" class="form-control" id="inputEndereco" placeholder="Endereço" name="endereco">
            </div>
            <div class="form-row">
                <div class="form-group col-md-5">
                    <label for="inputFacebook">Facebook</label>
                    <input type="text" class="form-control" id="inputFacebook" name="facebook">
                </div>
                <div class="form-group col-md-5">
                    <label for="inputInstagram">Instagram</label>
                    <input type="text" class="form-control" id="inputInstagram" name="instagram">
                   
                </div>
                <div class="form-group col-md-2">
                    <label for="inputStatus">Status</label>
                    <select id="inputStatus" class="form-control" name="status">
                        <option value="ativo" selected>Ativo</option>
                        <option value="inativo">Inativo</option>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</div>
@endsection