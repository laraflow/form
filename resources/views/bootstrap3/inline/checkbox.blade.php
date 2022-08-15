<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null), 'placeholder' => $attributes['placeholder'] ?? $label];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Hafijul233\Form\Facades\Form::checkbox($name, $checked, array_merge($options, $attributes)) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
