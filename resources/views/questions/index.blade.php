@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 style="display: inline">Perguntas</h2>
            <a href="{{ route('questions.create') }}" class="btn btn-primary float-end">Adicionar</a>
        </div>
        <div class="card-body">
            <questions-index :dimensions="{{ json_encode($dimensions) }}"></questions-index>
        </div>        
    </div>
@endsection