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

                    @component('components.form.input_text', ['field' => 'keywords',
                    'label' => 'Palavras-Chave',
                    'model' => 'topic',
                    'required' => true,
                    'errors' => $errors]) @endcomponent

    <div class="input-group control-group increment">
        <input type="file" name="attachments[]" class="form-control">
        <div class="input-group-btn">
            <button class="btn btn-success" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
    </div>
    <div class="clone hide">
        <div class="control-group input-group" style="margin-top:10px">
            <input type="file" name="attachments[]" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
        </div>
    </div>



    <a class="btn btn-outline-primary" href="{{route('index.topic')}}">Voltar</a>

    <button type="submit" class="btn btn-primary" style="margin-left: 82%">Criar Tópico</button>

</form>


@endsection