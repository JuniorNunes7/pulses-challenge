@extends('layout.app')

@section('content')
    <div class="main">
        <div class="col">
            <h2>Dimensões</h2>
            <a href="{{ route('dimensions.create') }}" class="btn btn-primary float-end">Adicionar</a>

            <dimensions-index></dimensions-index>
        </div>
    </div>
@endsection