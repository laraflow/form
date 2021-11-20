<div class="form-inline">

    {!! Form::nLabel($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];
        $msg = $errors->first($name) ?? null;
        if(isset($required) && $required == true)
        $options['required'] = 'required';
    @endphp

    @foreach($values as $value => $display)

        @php $id = $name . '-radio-' . $value; $options['id'] = $id; @endphp

        <div class="custom-control custom-radio custom-control-inline">
            {!! \Form::radio($name, $value, ($value == $checked), array_merge($options, $attributes)) !!}

            {!! Form::nLabel($id, $display,false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! Form::nError($name, $msg) !!}
</div>
