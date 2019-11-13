@extends('layouts.app')

@section('content')
@foreach($tutores as $tutor)
    {{ $tutor->nome }}
@endforeach
@endsection