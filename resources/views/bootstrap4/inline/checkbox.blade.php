<div class="form-inline">

    {!! \Laraflow\Form\Facades\Form::label($name . '[]', $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'custom-control-input '];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    @foreach ($values as $value => $display)
        @php
            $id = $name . '-checkbox-' . $value;
            $options['id'] = $id;
        @endphp

        <div class="custom-control custom-checkbox custom-control-inline">
            {!! \Laraflow\Form\Facades\Form::checkbox(
                $name . '[]',
                $value,
                in_array($value, $checked),
                $required,
                $attributes,
            ) !!}

            {!! \Laraflow\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
