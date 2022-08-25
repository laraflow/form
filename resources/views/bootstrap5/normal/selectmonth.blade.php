<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select'];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Hafijul233\Form\Facades\Form::selectMonth($name, $selected, $required, $attributes) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
