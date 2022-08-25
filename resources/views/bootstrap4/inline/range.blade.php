<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'form-control custom-range '];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Laraflow\Form\Facades\Form::range($name, $default, $required, $attributes) !!}
    @if (isset($attributes['min']) && isset($attributes['max']))
        <div class="d-flex justify-content-between">
            <div class="font-weight-bolder">{{ $attributes['min'] }}</div>
            <div class="font-weight-bolder">{{ $attributes['max'] }}</div>
        </div>
    @endif
    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
