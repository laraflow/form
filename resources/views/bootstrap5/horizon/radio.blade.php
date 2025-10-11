<div class="mb-3 row">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, [
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
                $id = $name . '-radio-' . $value;
                $options['id'] = $id;
            @endphp

            <div class="custom-control custom-radio">
                {!! \Laraflow\Form\Facades\Form::radio($name, $value, $value == $checked, $required, $attributes) !!}

                {!! \Laraflow\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
            </div>
        @endforeach

        {!! \Laraflow\Form\Facades\Form::error($name) !!}
    </div>
</div>
