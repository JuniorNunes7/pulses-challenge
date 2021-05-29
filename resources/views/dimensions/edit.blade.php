@extends('layout.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2 style="display: inline">Editar Dimensão</h2>
        </div>
        <div class="card-body">
            <dimensions-form 
                :edit="true"
                :edit-data="{{ json_encode($dimension) }}" 
                :old="{{ json_encode(old()) }}" 
                :errors="{{ json_encode($errors->messages()) }}"
            ></dimensions-form>
        </div>
    </div>
@endsection