<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-control-input' @endphp
    @foreach ($values as $value => $display)
        @php $options['id'] = $name . '-radio-' . $value @endphp

        <div class="custom-control custom-radio">
            {!! \Laraflow\Form\Facades\Form::radio($name, $value, $value == $checked, $required, $attributes) !!}

            {!! \Laraflow\Form\Facades\Form::label($options['id'], $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach


    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
