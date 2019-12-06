@extends('layouts.app')
@section('content')

@auth
@switch(Auth::user()->tipoUsuario)
@case('admin')
<div class="container">
    <div class="col-md-12">
        <form action="{{route('creche.update', ['creche' => $creche -> id])}}" enctype="multipart/form-data" class="form-horizontal" method="POST">
            @csrf
            @method('PUT')
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="inputData">Data:</label>
                    <input type="date" class="form-control" id="inputData" name="data" value="{{old('data', $creche -> data)}}">
                </div>
                @if($creche->status == "ativo")
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
                <div class="form-group col-md-4">
                    <label for="pet_id">Pet</label>
                    <select name="pet_id" class="form-control">
                        @foreach( $pets as $pet )
                        <option value="{{ $pet->id }}" 
                            @if($pet->id === $creche->pet_id)
                             selected
                            @endif>{{ $pet->nome }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="inputObservacoes">Observações:</label>
                <textarea class="form-control" id="inputObservacoes" rows="3">{{old('observacoes', $creche -> observacoes)}}</textarea>
            </div>

    </div>
    <button type="submit" class="btn btn-primary">Editar</button>
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