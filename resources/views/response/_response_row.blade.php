<div class="card mb-5">
	<div class="card-body">
		<span>Usuário:{{$response->user->name}} - Data: {{$response->created_at->format('d/m/Y')}}</span>
		<h4 class="card-title">Resposta:</h4>
        <p class="card-text">{{$response->content}}</p>
        @if($response->attachments)
		<?php foreach (json_decode($response->attachments) as $picture) { ?>
      <img src="{{ asset('/images/'.$picture) }}" class="image-topic" />
    <?php } ?>
    @endif
	</div>
</div>