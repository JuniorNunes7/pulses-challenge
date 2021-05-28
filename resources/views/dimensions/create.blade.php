@extends('layout.app')

@section('content')
    <div class="main">
        <div class="col">
            <h2>Adicionar Dimensão</h2>

            <dimensions-form 
                :edit="false" 
                :old="{{ json_encode(old()) }}" 
                :errors="{{ json_encode($errors->messages()) }}"
            ></dimensions-form>
        </div>
    </div>
@endsection