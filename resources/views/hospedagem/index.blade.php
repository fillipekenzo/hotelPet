@extends('layouts.app')
@section('content')

@auth
<div class="container">
    <div class="col-md-12">
        <table class="table table-bordered">
            <thead class="thead-light">
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Data Entrada:</th>
                    <th scope="col">Data Saida:</th>
                    <th scope="col">Observações</th>
                    <th scope="col">Pet:</th>
                    <th scope="col">Funcionario Responsável:</th>
                    <th scope="col">Valor Diária:</th>
                    <th scope="col">Valor Total:</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hospedagens as $hospedagem)

                <tr>
                    <th scope="row">{{ $hospedagem->id }}</th>
                    <td>{{ $hospedagem->data_entrada }}</td>
                    <td>{{ $hospedagem->data_saida }}</td>
                    <td>{{ $hospedagem->observacoes }}</td>
                    <td>{{ $hospedagem->pet->nome}}</td>
                    <td>{{ $hospedagem->user->name}}</td>
                    <td>{{ $hospedagem->valor_diaria }}</td>
                    <td>{{ $hospedagem->valor_total }}</td>
                    <td>{{ $hospedagem->status }}</td>
                    <td>
                        <a class="btn btn-primary btn-sm" href="{{ route('hospedagem.show', ['hospedagem' => $hospedagem->id]) }}" role="button">Visualizar</a>
                        @if(Auth::user()->tipoUsuario == 'admin')
                        <a class="btn btn-warning btn-sm" href="{{ route('hospedagem.edit', ['hospedagem' => $hospedagem->id]) }}" role="button">Editar</a>
                        @endif
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>
</div>
@else
<a href="{{ route('login') }}">Login</a>
@endauth
@endsection