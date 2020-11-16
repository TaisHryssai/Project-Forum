@extends('layouts.app')

@section('title', 'Identificação usuário')
@section('content')

<form class="class-form" action="{{ route('create.user.response', $topic->id) }}" method="POST" novalidate>
    @csrf
    @component('components.form.input_text', ['field' => 'name',
    'label' => 'Identificação',
    'placeholder' => 'Adicione seu nome/nickname',
    'model' => 'user',
    'required' => true,
    'errors' => $errors]) @endcomponent

    @component('components.form.input_submit',['value' => 'Criar', 'back_url' => route('index.topic')]) @endcomponent
</form>

@endsection