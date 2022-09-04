<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}
    {!! \Form::password($name, $required, $attributes) !!}
    {!! \Form::error($name . '[]') !!}
</div>
