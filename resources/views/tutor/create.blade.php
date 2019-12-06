@extends('layouts.app')
@section('content')

@auth
@switch(Auth::user()->tipoUsuario)
@case('admin')
<div class="container-fluid">
    <div class="card mb-3">
        <div class="card-header">
            <a class="btn btn-success btn-sm ml-auto" href="{{ route('tutor.index') }}" role="button">
                <i class="fas fa-fw fa-chevron-left"></i> Voltar
            </a>
            <i class="fas fa-user-plus"></i>
            Cadastrar Tutor

        </div>
        <div class="card-body">
            <form action="{{route('tutor.store')}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome:</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFoto">Escolha a foto do tutor</label>
                        <input type="file" class="form-control-file" id="inputFoto" name="foto">
                    </div>
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