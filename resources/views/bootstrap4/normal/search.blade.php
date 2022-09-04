<div class="{{ wrapper($attributes) }}">

    {!! \Form::label($name, $label, $required) !!}
    {!! \Form::search($name, $default, $required, $attributes) !!}


    {!! \Form::error($name . '[]') !!}
</div>
