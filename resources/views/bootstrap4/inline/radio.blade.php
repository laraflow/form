<div class="form-inline">

    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : null)];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    @foreach ($values as $value => $display)
        @php
            $id = $name . '-radio-' . $value;
            $options['id'] = $id;
        @endphp

        <div class="custom-control custom-radio custom-control-inline">
            {!! \Hafijul233\Form\Facades\Form::radio($name, $value, $value == $checked, array_merge($options, $attributes)) !!}

            {!! \Hafijul233\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
