<div class="form-group row">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'col-form-label col-sm-' . $col_size]) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null)];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        {!! \Hafijul233\Form\Facades\Form::text($name, $default, array_merge($options, $attributes)) !!}

        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>
</div>
