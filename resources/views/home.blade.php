@extends('layouts.app')
@section('content')
@auth
<div class="container-fluid">
    @if (session('status'))
    <div class="alert alert-success" role="alert">
        {{ session('status') }}
    </div>
    @endif
    <!-- Icon Cards-->
   <h1> Bem vindo ao sistema de gerenciamento de Hotel e Creche </h1>
</div>
@else
<div class="container mx-auto" align="center">
    <a class="btn btn-primary" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
    <a class="btn btn-success " href="{{ route('register') }}">{{ __('Registrar') }}</a>
    @endif
</div>
@endauth
@endsection