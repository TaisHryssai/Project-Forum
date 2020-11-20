<label class="form-control-label string required" for="name">
    {{ $label}} @if ($required) <abbr title="obrigatório">*</abbr> @endif
</label>

<div class="input-group control-group {{ $classIncrement }} string @if ($required) required @endif {{ $model }}_{{ $field }}">
    <input class="form-control string @if ($required) required @endif @if ($errors->has($field)) is-invalid @endif" @if ($required) required="required" @endif autofocus="autofocus" type="file" name="{{ $field }}[]" value="{{ $value ?? '' }}" id="{{ $model }}_{{ $field }}" />

    <div class="input-group-btn">
        <button class="btn btn-success" id="{{$idButtonAdd}}" type="button"><i class="glyphicon glyphicon-plus"></i>Add</button>
    </div>
</div>
<div class="hide mb-5 string @if ($required) required @endif {{ $model }}_{{ $field }}" id="{{ $idCloneKeywords }}">
    <div class="control-group control-keywords input-group mt-3" id="{{ $divRemove }}">
        <input class="form-control string @if ($required) required @endif @if ($errors->has($field)) is-invalid @endif" @if ($required) required="required" @endif autofocus="autofocus" type="file" name="{{ $field }}[]" value="{{ $value ?? '' }}" />

        <div class="input-group-btn">
            <button class="btn btn-danger" id="{{$idButtonRemove}}" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
        </div>
    </div>
</div>


@if ($errors->has($field))
<span class="invalid-feedback" role="alert">
    @foreach ($errors->get($field) as $message)
    <strong>{{ $message }}</strong>
    @endforeach
</span>
@endif

<small class="form-text text-muted">{{ $hint ?? ''}}</small>