<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    {!! \Form::selectMonth($name, $selected, $required, $attributes) !!}

    {!! \Form::error($name . '[]') !!}
</div>
