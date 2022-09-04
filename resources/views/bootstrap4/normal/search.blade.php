<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}
    {!! \Form::search($name, $default, $required, $attributes) !!}


    {!! \Form::error($name . '[]') !!}
</div>
