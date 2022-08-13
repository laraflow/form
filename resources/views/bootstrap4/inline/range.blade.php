<div class="form-group">
    {!! \Form::label($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'form-control custom-range ' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp

    {!! \Form::range($name, $default, array_merge($options, $attributes)) !!}
    @if(isset($attributes['min']) && isset($attributes['max']))
        <div class="d-flex justify-content-between">
            <div class="font-weight-bolder">{{ $attributes['min'] }}</div>
            <div class="font-weight-bolder">{{ $attributes['max'] }}</div>
        </div>
    @endif
    {!! \Form::error($name) !!}
</div>
