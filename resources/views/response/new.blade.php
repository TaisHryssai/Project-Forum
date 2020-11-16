@extends('layouts.app')

@section('title', 'Novo Tópico')
@section('content')

<div class="card mb-5">
  <h5 class="card-header card-color">{{ $topic->title }}</h5>
  <div class="card-body">
    <span>Usuário: {{ $topic->user->name }} - Data: {{ $topic->created_at->format('d/m/Y H:i') }}</span>
    <h4 class="card-title">Descrição:</h4>
    <p class="card-text">{{ $topic->content }}</p>
    <strong> <span>Palavras-chave: </strong> {{ $topic->keywords }}</span>
    <p class="card-text">Anexos: <a href=""></a></p>
    <?php foreach (json_decode($topic->attachments) as $picture) { ?>
      <img src="{{ asset('/images/'.$picture) }}" style="height:120px; width:200px" />
      <a href="">{{$picture}}</a>
    <?php } ?>
  </div>
</div>


<form action="{{route('create.response', ['user_id' => $user->id, 'id' => $topic->id])}}" method="POST" novalidate enctype="multipart/form-data">
  @csrf

  @component('components.form.input_textarea', ['field' => 'content',
  'label' => 'Conteúdo',
  'model' => 'topic',
  'required' => true,
  'errors' => $errors]) @endcomponent


  <div class="input-group control-group increment mb-2">
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
  @component('components.form.input_submit',['value' => 'Responder Tópico', 'back_url' => route('index.topic')]) @endcomponent
</form>

@endsection