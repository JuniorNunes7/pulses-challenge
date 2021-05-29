@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 style="display: inline">Dimensões</h2>
            <a href="{{ route('dimensions.create') }}" class="btn btn-primary float-end">Adicionar</a>
        </div>
        <div class="card-body">
            <dimensions-index></dimensions-index>
        </div>        
    </div>
@endsection