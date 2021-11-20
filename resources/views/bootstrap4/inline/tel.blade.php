<div class="form-group">
    {!! Form::nLabel($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
    $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL )];

    $msg = $errors->first($name) ?? null;

    if(isset($required) && $required == true)
    $options['required'] = 'required';
    @endphp

    {!! Form::tel($name, $default, array_merge($options, $attributes)) !!}

    {!! Form::nError($name, $msg) !!}
</div>
