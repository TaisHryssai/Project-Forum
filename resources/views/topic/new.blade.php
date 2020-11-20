@extends('layouts.app')

@section('title', 'Novo Tópico')
@section('content')

<form action="{{route('create.topic', $user->id)}}" method="POST" novalidate enctype="multipart/form-data">
    @csrf

            @component('components.form.input_text', ['field' => 'title',
            'label' => 'Título',
            'placeholder' => 'Adicione o titulo do seu tópico',
            'model' => 'topic',
            'required' => true,
            'errors' => $errors]) @endcomponent

            @component('components.form.input_textarea', ['field' => 'content',
            'label' => 'Conteúdo',
            'model' => 'topic',
            'required' => true,
            'errors' => $errors]) @endcomponent

            @component('components.form.input_add_text', ['field' => 'keywords',
            'label' => 'Palavras-Chave',
            'placeholder' => 'Adicione uma palavra-chave por vez',
            'classIncrement' => 'increment-keywords',
            'idButtonAdd' => 'keywords-add',
            'idCloneKeywords' => 'clone-keywords',
            'divRemove' => 'form-keyword',
            'idButtonRemove' => 'keywords-remove',
            'model' => 'topic',
            'required' => true,
            'errors' => $errors]) @endcomponent

            @component('components.form.input_add_file', ['field' => 'attachments',
            'label' => 'Anexos',
            'classIncrement' => 'increment',
            'idButtonAdd' => 'add-attachments',
            'idCloneKeywords' => 'clone',
            'divRemove' => 'control-group',
            'idButtonRemove' => 'btn-danger',
            'model' => 'topic',
            'required' => true,
            'errors' => $errors]) @endcomponent
           

    @component('components.form.input_submit',['value' => 'Criar Tópico', 'back_url' => route('index.topic')]) @endcomponent

</form>
@endsection