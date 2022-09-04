<div class="form-group row">
    {!! \Form::label($name, $label, $required, [
        'class' => 'col-form-label col-sm-' . $col_size,
    ]) !!}

    @php
        $options = ['class' => 'form-control', 'rows' => 3];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        {!! \Form::textarea($name, $default, $required, $attributes) !!}

        {!! \Form::error($name) !!}
    </div>
</div>
