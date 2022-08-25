<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control', 'rows' => 3];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Laraflow\Form\Facades\Form::textarea($name, $default, $required, $attributes) !!}

    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
