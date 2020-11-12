<tr>
	<td>{{ $topic->title }}</td>
	<td>{{ $topic->user->name }}</td>
	<td>{{ $topic->created_at->format('d/m/Y H:i') }}</td>
	<td><a href="{{route('show.topic', $topic->id)}}" class="btn btn-primary"><i class="fas fa-search"></i> Visualizar Tópico</a></td>
</tr>