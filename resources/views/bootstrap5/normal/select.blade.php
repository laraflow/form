<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select'];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Laraflow\Form\Facades\Form::select($name, $data, $selected, $required, $attributes) !!}

    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
