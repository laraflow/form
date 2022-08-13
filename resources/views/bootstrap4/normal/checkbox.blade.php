<div class="form-group">

    {!! \Form::label($name . '[]', $label, $required) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : null)];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    @foreach ($values as $value => $display)
        @php
            $id = $name . '-checkbox-' . $value;
            $options['id'] = $id;
        @endphp

        <div class="custom-control custom-checkbox">
            {!! \Form::checkbox($name . '[]', $value, in_array($value, $checked), array_merge($options, $attributes)) !!}

            {!! \Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Form::error($name . '[]') !!}
</div>
