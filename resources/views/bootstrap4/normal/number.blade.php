<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}

    {!! \Form::number($name, $default, $required, $attributes) !!}

    {!! \Form::error($name . '[]') !!}
</div>
