<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control', 'placeholder' => $attributes['placeholder'] ?? $label];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Laraflow\Form\Facades\Form::checkbox($name, $checked, $required, $attributes) !!}

    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
