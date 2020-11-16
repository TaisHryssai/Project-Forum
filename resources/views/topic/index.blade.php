@extends('layouts.app')

@section('title', 'Todos os Tópicos')
@section('content')

@component('components.index.header', ['base_search_path' => route('index.topic'),
'new_url' => route('new.user'),
'new_btn_name' => 'Adicionar Tópico']) @endcomponent

<div class="table-responsive mt-3">
  @component('components.index.page_entries_info', ['entries' => $topics]) @endcomponent
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Tópico</th>
        <th scope="col">Usuário</th>
        <th scope="col">Data</th>
        <th></th>
      </tr>
    </thead>
    <tbody>
      @each('topic._topic_row', $topics, 'topic')
    </tbody>
  </table>
  <div class="mt-5 float-right flex-wrap">
    {!! $topics->links() !!}
  </div>
</div>
@endsection