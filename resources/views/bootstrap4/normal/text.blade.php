<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}
    {!! \Form::text($name, $default, $required, $attributes) !!}
    {!! \Form::error($name . '[]') !!}
</div>
