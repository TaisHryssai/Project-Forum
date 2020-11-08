@extends('layouts.app')

@section('title', 'Novo Tópico')
@section('content')

<form action="{{route('create.topic', $user->id)}}" method="POST"  novalidate enctype="multipart/form-data">
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
                                              <a class="btn btn-outline-primary" href="{{route('index.topic')}}">Voltar</a>

<button type="submit" class="btn btn-primary" style="margin-left: 82%">Criar Tópico</button>

</form>
<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
    Adicionar Palavras-Chave
  </a>
</p>
<div class="collapse" id="collapseExample">
  <div class="card card-body">
@include('topic._form_keyword')
  </div>
</div>

<p>
  <a class="btn btn-primary" data-toggle="collapse" href="#attachments" role="button" aria-expanded="false" aria-controls="attachments">
    Adicionar Anexos
  </a>
</p>
<div class="collapse" id="attachments">
  <div class="card card-body">
@include('topic._form_attachments')
  </div>
</div>



@endsection
