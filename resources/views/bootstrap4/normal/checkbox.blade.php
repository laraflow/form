<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}

    @php $attributes['class'][] = 'custom-control-input' @endphp

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
                $required,  $attributes,
            ) !!}

            {!! \Hafijul233\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Hafijul233\Form\Facades\Form::error($name . '[]') !!}
</div>
