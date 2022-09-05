<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::search($name, $default, $required, $attributes) !!}

    {!! \Form::error($name) !!}
</div>
