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
            <i class="fas fa-user-edit"></i>
            Editar Tutor

        </div>
        <div class="card-body">
            <form action="{{route('tutor.update', ['tutor' => $tutor -> id])}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="inputNome">Nome:</label>
                        <input type="text" class="form-control" id="inputNome" placeholder="Nome" name="nome" value="{{old('nome', $tutor -> nome)}}">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="inputFoto">Escolha a foto do tutor</label>
                        <input type="file" class="form-control-file" id="inputFoto" name="foto" value="{{old('foto', $tutor -> foto)}}">
                    </div>
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
                    @if($tutor->status == "ativo")
                    <div class="form-group col-md-2">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control" name="status">
                            <option value="ativo" selected>Ativo</option>
                            <option value="inativo">Inativo</option>
                        </select>
                    </div>
                    @else
                    <div class="form-group col-md-2">
                        <label for="inputStatus">Status</label>
                        <select id="inputStatus" class="form-control" name="status">
                            <option value="ativo">Ativo</option>
                            <option value="inativo" selected>Inativo</option>
                        </select>
                    </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Editar</button>
            </form>
        </div>
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