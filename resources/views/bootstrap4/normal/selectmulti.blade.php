<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select' . ($errors->has($name) ? ' is-invalid' : null), 'multiple' => 'multiple'];
        $options['id'] = $name;
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Hafijul233\Form\Facades\Form::select($name . '[]', $data, $selected, array_merge($options, $attributes)) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
