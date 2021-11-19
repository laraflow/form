<div class="form-group">

    {!! Form::nLabel($name, $label, $required) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];
        $msg = $errors->first($name) ?? null;
        if(isset($required) && $required == true)
        $options['required'] = 'required';

    @endphp

    @foreach($values as $value => $display)

        @php $options['id'] = $name . '-checkbox-'; @endphp

        <div class="custom-control custom-checkbox">
            {!! \Form::checkbox($name, $value, $checked, array_merge($options, $attributes)) !!}

            {!! Form::nLabel($name . '-checkbox-', $displaynull, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! Form::nError($name, $msg) !!}
</div>
