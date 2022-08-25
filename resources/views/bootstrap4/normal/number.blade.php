<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name . '[]', $label, $required) !!}

    {!! \Laraflow\Form\Facades\Form::number($name, $default, $required, $attributes) !!}

    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
