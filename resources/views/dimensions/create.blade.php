@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 style="display: inline">Adicionar Dimensão</h2>
        </div>
        <div class="card-body">
            <dimensions-form 
                :edit="false" 
                :old="{{ json_encode(old()) }}" 
                :errors="{{ json_encode($errors->messages()) }}"
            ></dimensions-form>
        </div>
    </div>
@endsection