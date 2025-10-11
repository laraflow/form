<div class="mb-3 row">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, [
        'class' => 'col-form-label col-sm-' . $col_size,
    ]) !!}

    @php

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        {!! \Laraflow\Form\Facades\Form::url($name, $default, $required, $attributes) !!}
        {!! \Laraflow\Form\Facades\Form::hint($attributes) !!}
        {!! \Laraflow\Form\Facades\Form::error($name) !!}
    </div>
</div>
