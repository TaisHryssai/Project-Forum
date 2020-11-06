@extends('layouts.app')

@section('title', 'Respostas do Tópico')
@section('content')

<div class="card mb-5">
  <h5 class="card-header">Titulo Aqui</h5>
  <div class="card-body">
    <span>Usuário:Nome do usuario - Data: data com hora</span>
    <h4 class="card-title">Descrição:</h4>
    <p class="card-text">Conteudo do topico</p>
    <p class="card-text">Anexos: <a href=""></a></p>
    <span>Palavras-chave: </span>
  </div>
</div>


<h3>Respostas:</h3>

<a class="btn btn-outline-primary" href="{{route('index.topic')}}">Voltar</a>

<a class="btn btn-outline-success" href="" style="">Responder Tópico</a>

@endsection
