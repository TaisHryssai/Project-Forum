@extends('layouts.app')

@section('title', 'Novo Tópico')
@section('content')

<div class="card mb-5">
  <h5 class="card-header card-color">{{ $topic->title }}</h5>
  <div class="card-body">
    <span>Usuário: {{ $topic->user->name }} - Data: {{ $topic->created_at->format('d/m/Y H:i') }}</span>
    <h4 class="card-title">Descrição:</h4>
    <p class="card-text">{{ $topic->content }}</p>
    <strong> <span>Palavras-chave: </strong></span>

    <?php foreach (json_decode($topic->keywords) as $picture) { ?>
      <span class="badge badge-info">{{ $picture }}</span>
    <?php } ?>
    @if($topic->attachments)
    <p class="card-text">Anexos: <a href=""></a></p>
    <?php foreach (json_decode($topic->attachments) as $picture) { ?>
      <img src="{{ asset('/images/'.$picture) }}" class="image-topic" />
      <a href="">{{$picture}}</a>
    <?php } ?>
    @endif
  </div>
</div>


<form action="{{route('create.response', ['user_id' => $user->id, 'id' => $topic->id])}}" method="POST" novalidate enctype="multipart/form-data">
  @csrf

        @component('components.form.input_textarea', ['field' => 'content',
        'label' => 'Conteúdo',
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

  @component('components.form.input_submit',['value' => 'Responder Tópico', 'back_url' => route('index.topic')]) @endcomponent
</form>

@endsection