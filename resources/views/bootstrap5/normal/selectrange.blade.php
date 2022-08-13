<div class="form-group">
    {!! Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp

    {!! Form::selectRange($name, $begin, $end, $selected, array_merge($options, $attributes)) !!}
    {!! Form::nError($name, $msg) !!}
</div>
