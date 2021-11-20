<div class="form-group row">
    {!! Form::nLabel($name, $label, $required, ['class' => 'col-form-label col-sm-' . $col_size]) !!}

    @php
    $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL ), 'rows' => 3];

    $msg = $errors->first($name) ?? null;

    if(isset($required) && $required == true)
    $options['required'] = 'required';
    @endphp

    {!! Form::textarea($name, $default, array_merge($options, $attributes)) !!}

    {!! Form::nError($name, $msg) !!}
</div>
