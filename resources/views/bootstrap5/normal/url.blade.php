<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::url($name, $default, $required, $attributes) !!}

    {!! \Form::error($name) !!}
</div>
