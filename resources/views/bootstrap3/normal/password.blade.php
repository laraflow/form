<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::password($name, $required, $attributes) !!}

    {!! \Form::error($name) !!}
</div>
