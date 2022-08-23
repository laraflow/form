<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    @php $attributes['class'][] = 'custom-control-input' @endphp
    @foreach ($values as $value => $display)
        @php $options['id'] = $name . '-radio-' . $value @endphp

        <div class="custom-control custom-radio">
            {!! \Hafijul233\Form\Facades\Form::radio($name, $value, $value == $checked, $required, $attributes) !!}

            {!! \Hafijul233\Form\Facades\Form::label($options['id'], $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach


    {!! \Hafijul233\Form\Facades\Form::error($name . '[]') !!}
</div>
