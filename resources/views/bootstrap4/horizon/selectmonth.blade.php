<div class="form-group row row">
    {!! Form::nLabel($name, $label, $required) !!}

    @php
    $options = ['class' => 'form-control custom-select' . ($errors->has($name) ? ' is-invalid' : NULL )];

    $msg = $errors->first($name) ?? null;

    if(isset($required) && $required == true)
    $options['required'] = 'required';
    @endphp

    {!! Form::selectMonth($name, $selected, array_merge($options, $attributes)) !!}

    {!! Form::nError($name, $msg) !!}
</div>
