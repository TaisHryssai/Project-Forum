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
      <th></th>
    </tr>
  </thead>
  <tbody>
    @each('topic._topic_row', $topics, 'topic')
  </tbody>
</table>

<h4><i class="glyphicon glyphicon-picture"></i> Display Data Image </h4>
<table class="table table-bordered table-hover table-striped">
  <thead>
    <tr>
      <th>#</th>
      <th>Picture</th>
    </tr>
  </thead>
  <tbody>
    @foreach($topics as $image)
    <tr>
      <td>{{$image->id}}</td>
      <td> <?php foreach (json_decode($image->attachments) as $picture) { ?>
          <img src="{{ asset('/images/'.$picture) }}" style="height:120px; width:200px" />
        <?php } ?>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection