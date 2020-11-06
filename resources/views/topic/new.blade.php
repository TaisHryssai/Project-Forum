@extends('layouts.app')

@section('title', 'Novo Tópico')
@section('content')

<form action="" method="POST"  novalidate enctype="multipart/form-data">
    @csrf

        @component('components.form.input_text', ['field'    => 'title',
                                              'label'    => 'Título',
                                              'placeholder' => 'Adicione o titulo do seu tópico',
                                              'model'    => 'topic',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

        @component('components.form.input_textarea', ['field'    => 'content',
                                              'label'    => 'Conteúdo',
                                              'model'    => 'topic',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

        @component('components.form.input_text', ['field'    => 'keywords',
                                              'label'    => 'Palavras-Chave',
                                              'placeholder' => 'Ex: youtube, linux',
                                              'model'    => 'ask',
                                              'required' => true,
                                              'errors'   => $errors]) @endcomponent

        @component('components.form.input_file', ['field'    => 'attachment',
                                              'model'    => 'ask',
                                              'required' => false,
                                              'errors'   => $errors]) @endcomponent

        <a class="btn btn-outline-primary" href="">Voltar</a>

        <button type="submit" class="btn btn-primary" style="margin-left: 82%">Criar Tópico</button>

</form>

@endsection
