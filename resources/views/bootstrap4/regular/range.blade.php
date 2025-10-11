<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}
    {!! \Laraflow\Form\Facades\Form::hint($attributes) !!}
    @php $attributes['class'][] = 'custom-range' @endphp

    {!! \Laraflow\Form\Facades\Form::range($name, $default, $required, $attributes) !!}

    @if (isset($attributes['min']) && isset($attributes['max']))
        <div class="d-flex justify-content-between">
            <div class="font-weight-bolder">{{ $attributes['min'] }}</div>
            <div class="font-weight-bolder">{{ $attributes['max'] }}</div>
        </div>
    @endif
</div>
