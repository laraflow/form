<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}

    {!! \Form::date($name, $default, $required, $attributes) !!}

    {!! \Form::error($name . '[]') !!}
</div>
