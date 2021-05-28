@extends('layout.app')

@section('content')
    <div class="main">
        <div class="col">
            <h2>Editar Dimensão</h2>

            <dimensions-form 
                :edit="true"
                :edit-data="{{ json_encode($dimension) }}" 
                :old="{{ json_encode(old()) }}" 
                :errors="{{ json_encode($errors->messages()) }}"
            ></dimensions-form>
        </div>
    </div>
@endsection