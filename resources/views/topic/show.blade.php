@extends('layouts.app')

@section('title', 'Respostas do Tópico')
@section('content')

<div class="card mb-5">
  <h5 class="card-header">{{ $topic->title }}</h5>
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


<h3>Respostas:</h3>

@each('response._response_row', $topic->responses, 'response')


<a class="btn btn-outline-primary" href="{{route('index.topic', $user->id)}}">Voltar</a>

<a class="btn btn-outline-success" href="{{route('new.user.response', $topic->id)}}" style="margin-left:88%">Responder Tópico</a>

@endsection