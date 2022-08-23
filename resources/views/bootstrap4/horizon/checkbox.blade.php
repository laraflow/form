<div class="form-group row">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required, [
        'class' => 'col-form-label col-sm-' . $col_size,
    ]) !!}

    @php
        $options = ['class' => 'custom-control-input '];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    <div class="col-sm-{{ 12 - $col_size }}">
        @foreach ($values as $value => $display)
            @php
                $id = $name . '-checkbox-' . $value;
                $options['id'] = $id
            @endphp

            <div class="custom-control custom-checkbox">
                {!! \Hafijul233\Form\Facades\Form::checkbox(
                    $name . '[]',
                    $value,
                    in_array($value, $checked),
                    $required,
                    $attributes,
                ) !!}

                {!! \Hafijul233\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
            </div>
        @endforeach

        {!! \Hafijul233\Form\Facades\Form::error($name . '[]') !!}
    </div>
</div>
