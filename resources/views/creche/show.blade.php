@extends('layouts.app')
@section('content')
@auth
<div class="container">
    <div class="col-md-12">
        <h1 class="h1">ID: {{$creche -> id}}</h1>
        <p><b>Pet </b>{{$creche -> pet->nome}}</p>
        <p><b>Data: </b>{{$creche -> data}}</p>
        <p><b>Observações: </b>{{$creche -> observacoes}}</p>
        <p><b>Status: </b>{{$creche -> status}}</p>
    </div>
    <form action="{{route('creche.destroy', $creche->id)}}" class="form-horizontal" enctype="multipart/form-data" method="POST">
        @csrf
        <input type="hidden" name="_method" value="DELETE">
        <a class="btn btn-primary" href="{{ route('creche.index') }}" role="button">Voltar</a>
        @if(Auth::user()->tipoUsuario == 'admin')
        <button class="btn btn-danger" type="submit">Deletar Tutor: {{$creche->id}}</button>
        @endif
    </form>

</div>
@else
<a href="{{ route('login') }}">Login</a>
@endauth
@endsection