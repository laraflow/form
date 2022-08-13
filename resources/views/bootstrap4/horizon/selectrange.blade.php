<div class="form-group row">
    {!! Form::nLabel($name, $label, $required, ['class' => 'col-form-label col-sm-' . $col_size]) !!}

    @php
        $options = ['class' => 'form-control custom-select' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp
    <div class="col-sm-{{ (12-$col_size) }}">
        {!! Form::selectRange($name, $begin, $end, $selected, array_merge($options, $attributes)) !!}
        {!! Form::error($name) !!}
    </div>
</div>
