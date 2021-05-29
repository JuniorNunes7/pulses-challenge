@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 style="display: inline">Editar Pergunta</h2>
        </div>
        <div class="card-body">
            <questions-form 
                :edit="true"
                :edit-data="{{ json_encode($question) }}" 
                :old="{{ json_encode(old()) }}" 
                :errors="{{ json_encode($errors->messages()) }}"
                :dimensions="{{ json_encode($dimensions) }}"
            ></questions-form>
        </div>
    </div>
@endsection