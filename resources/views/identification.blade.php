@extends('layouts.identification')

@section('title', 'Identificação usuário')
@section('content')

<form class="class-form" action="{{ route('create.user') }}" method="POST"  novalidate>
    @csrf
        @component('components.form.input_text', ['field'    => 'name',
                                              'label'    => 'Identificação',
                                              'placeholder' => 'Adicione seu nome/nickname',
                                              'model'    => 'user',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent


        <button type="submit" class="btn btn-outline-secondary">Entrar</button>

</form>
@endsection
