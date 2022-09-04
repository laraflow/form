<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}
    {!! \Form::password($name, $required, $attributes) !!}
    {!! \Form::error($name . '[]') !!}
</div>
