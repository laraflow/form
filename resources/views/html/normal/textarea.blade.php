<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control', 'rows' => 3];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Hafijul233\Form\Facades\Form::textarea($name, $default, array_merge($options, $attributes)) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
