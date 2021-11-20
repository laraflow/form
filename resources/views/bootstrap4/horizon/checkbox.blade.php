<div class="form-group row">

    {!! Form::nLabel($name . '[]', $label, $required, ['class' => 'col-form-label col-sm-' . $col_size]) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];
        $msg = $errors->first($name) ?? null;
        if(isset($required) && $required == true)
        $options['required'] = 'required';
    @endphp

    @foreach($values as $value => $display)

        @php $id = $name . '-checkbox-' . $value; $options['id'] = $id; @endphp

        <div class="custom-control custom-checkbox">
            {!! \Form::checkbox($name . '[]', $value, in_array($value, $checked), array_merge($options, $attributes)) !!}

            {!! Form::nLabel($id, $display,false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! Form::nError($name . '[]', $msg) !!}
</div>
