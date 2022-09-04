<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control', 'rows' => 3];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::textarea($name, $default, $required, $attributes) !!}

    {!! \Form::error($name) !!}
</div>
