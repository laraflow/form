<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}
    @php $attributes['rows'] = $attributes['rows'] ?? 3 @endphp
    {!! \Form::textarea($name, $default, $required, $attributes) !!}

    {!! \Form::error($name . '[]') !!}
</div>
