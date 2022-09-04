<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}
    {!! \Form::text($name, $default, $required, $attributes) !!}
    {!! \Form::error($name . '[]') !!}
</div>
