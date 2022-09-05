<div class="form-group">
    {!! \Form::label($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control', 'placeholder' => $attributes['placeholder'] ?? $label];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::checkbox($name, $checked, $required, $attributes) !!}

    {!! \Form::error($name) !!}
</div>
