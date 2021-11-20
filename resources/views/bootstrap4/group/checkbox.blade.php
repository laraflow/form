<div class="form-group">
    {!! Form::nLabel($name, $label, $required) !!}

    @php
    $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL )];

    $msg = $errors->first($name) ?? null;

    if(isset($required) && $required == true)
    $options['required'] = 'required';
    @endphp

    {!! Form::checkbox($name, $checked, array_merge($options, $attributes)) !!}

    {!! Form::nError($name, $msg) !!}
</div>