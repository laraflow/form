<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    {!! \Laraflow\Form\Facades\Form::search($name, $default, $required, $attributes) !!}


    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
