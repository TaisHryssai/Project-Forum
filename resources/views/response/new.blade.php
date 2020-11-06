@extends('layouts.app')

@section('title', 'Novo Tópico')
@section('content')


<div class="card mb-5" >
  <h5 class="card-header card-color">titulo</h5>
  <div class="card-body">
    <span>Usuário: - Data: </span>
    <h4 class="card-title">Descrição:</h4>
    <p class="card-text">conteudo</p>
    <p class="card-text">Anexos: <a href=""></a></p>
    <p class="card-text">Palavras-chave: </p>
  </div>
</div>


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


        @component('components.form.input_file', ['field'    => 'attachment',
                                              'model'    => 'ask',
                                              'required' => false,
                                              'errors'   => $errors]) @endcomponent

        <a class="btn btn-outline-primary" href="">Voltar</a>

        <button type="submit" class="btn btn-primary" style="margin-left: 82%">Responder Tópico</button>

</form>

@endsection
