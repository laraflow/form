<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}

    @php $attributes['class'][] = 'custom-control-input' @endphp

    @foreach ($values as $value => $display)
        @php
            $attributes['id'] = "{$name}-checkbox-{$value}";
        @endphp

        <div class="custom-control custom-checkbox">
            {!! \Laraflow\Form\Facades\Form::checkbox($name, $value, in_array($value, $checked), $required, $attributes) !!}

            {!! \Laraflow\Form\Facades\Form::label($attributes['id'], $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
