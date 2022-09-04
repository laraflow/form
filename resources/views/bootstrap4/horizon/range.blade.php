<div class="form-group row">
    {!! \Form::label($name, $label, $required, [
        'class' => 'col-form-label col-sm-' . $col_size,
    ]) !!}

    @php
        $options = ['class' => 'form-control custom-range '];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        {!! \Form::range($name, $default, $required, $attributes) !!}
        @if (isset($attributes['min']) && isset($attributes['max']))
            <div class="d-flex justify-content-between">
                <div class="font-weight-bolder">{{ $attributes['min'] }}</div>
                <div class="font-weight-bolder">{{ $attributes['max'] }}</div>
            </div>
        @endif
        {!! \Form::error($name) !!}
    </div>
</div>
