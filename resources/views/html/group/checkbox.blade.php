<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Hafijul233\Form\Facades\Form::checkbox($name, $checked, $required, $attributes) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
