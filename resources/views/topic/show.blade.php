@extends('layouts.app')

@section('title', 'Respostas do Tópico')
@section('content')

<div class="card mb-5">
  <h5 class="card-header">{{ $topic->title }}</h5>
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
    <?php } ?>
    @endif
  </div>
</div>


<h3 class="text-muted font-weight-bold">Respostas:</h3>

@each('response._response_row', $topic->responses, 'response')

<div class="form-footer">
  <div class="d-flex">
    <a class="btn btn-secondary" href="{{ route('index.topic') }}">Voltar</a>
    <a class="btn btn-primary ml-auto" href="{{ route('new.user.response', $topic->id) }}">Responder</a>
  </div>
</div>

@endsection