<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    {!! \Form::select($name, $data, $selected, $required, $attributes) !!}
    {!! \Form::error($name . '[]') !!}
</div>
