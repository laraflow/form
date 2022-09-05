<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-control-input' @endphp

    @foreach ($values ?? [] as $value => $display)
        @php $attributes['id'] = $name . '-radio-' . $value @endphp

        <div class="custom-control custom-radio">
            {!! \Form::radio($name, $value, $value == $checked, $required, $attributes) !!}

            {!! \Form::label($attributes['id'], $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach
    {!! \Form::error($name) !!}
</div>
