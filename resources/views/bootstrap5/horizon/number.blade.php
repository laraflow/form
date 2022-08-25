<div class="form-group row">
    {!! \Laraflow\Form\Facades\Form::hLabel($name, $label, $required, $col_size) !!}

    @php
        $field_size = abs(12 - $col_size);
        $options = ['class' => 'form-control '];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-md-{{ $field_size }}">
        {!! \Laraflow\Form\Facades\Form::number($name, $default, $required, $attributes) !!}
        {!! \Laraflow\Form\Facades\Form::hError($name, $msg) !!}
    </div>
</div>
