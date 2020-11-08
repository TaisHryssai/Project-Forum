@extends('layouts.app')

@section('title', 'Todos os Tópicos')
@section('content')


      <a href="{{route('new.user')}}" class="btn btn-outline-primary d-block" style="margin-left: 75%">
        <i class="fas fa-plus"></i>
        Adicionar Tópico
      </a>
<table class="table">
  <thead>
    <tr>
      <th scope="col">Tópico</th>
      <th scope="col">Usuário</th>
      <th scope="col">Data</th>
      <th>	</th>
    </tr>
  </thead>
  <tbody>

  </tbody>
</table>
@endsection
