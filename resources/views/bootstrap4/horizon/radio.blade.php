<div class="form-group row">

    {!! \Form::label($name, $label, $required, ['class' => 'col-form-label col-sm-' . $col_size]) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : null)];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        @foreach ($values as $value => $display)
            @php
                $id = $name . '-radio-' . $value;
                $options['id'] = $id;
            @endphp

            <div class="custom-control custom-radio">
                {!! \Form::radio($name, $value, $value == $checked, array_merge($options, $attributes)) !!}

                {!! \Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
            </div>
        @endforeach

        {!! \Form::error($name) !!}
    </div>
</div>
