<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null)];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::password($name, array_merge($options, $attributes)) !!}

    {!! \Form::error($name) !!}
</div>
