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


    <div class="input-group control-group increment-keywords">
        <input type="text" name="keywords[]" class="form-control form-keywords">
        <div class="input-group-btn">
            <button class="btn btn-success" id="keywords-add" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
    </div>
    <div class="hide mb-5" id="clone-keywords">
        <div class="control-group control-keywords input-group mt-3">
            <input type="text" name="keywords[]" class="form-control" id="form-keyword">
            <div class="input-group-btn">
                <button class="btn btn-danger" id="keywords-remove" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
        </div>
    </div>

    <div class="input-group control-group increment">
        <input type="file" name="attachments[]" class="form-control">
        <div class="input-group-btn">
            <button class="btn btn-success" id="add-attachments" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
        </div>
    </div>
    <div class="hide mb-5" id="clone">
        <div class="control-group input-group mt-3">
            <input type="file" name="attachments[]" class="form-control">
            <div class="input-group-btn">
                <button class="btn btn-danger" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
        </div>
    </div>

    @component('components.form.input_submit',['value' => 'Criar Tópico', 'back_url' => route('index.topic')]) @endcomponent

</form>
@endsection