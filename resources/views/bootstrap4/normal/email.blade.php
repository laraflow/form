<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}

    {!! \Form::email($name, $default, $required, $attributes) !!}

    {!! \Form::error($name . '[]') !!}
</div>
