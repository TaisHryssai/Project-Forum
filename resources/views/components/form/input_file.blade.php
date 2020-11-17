<div class="form-group">
	<input type="file" class="form-control-file @if ($required) required @endif @if ($errors->has($field)) is-invalid @endif" @if ($required) required="required" @endif name="{{ $field }}" id="{{ $model}}_{{ $field }}" multiple>
	@if ($errors->has($field))
	<span class="invalid-feedback" role="alert">
		@foreach ($errors->get($field) as $message)
		<strong>{{ $message }}</strong>
		@endforeach
	</span>
	@endif
	<small class="form-text text-muted">{{ $hint ?? ''}}</small>
</div>