<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    {!! \Laraflow\Form\Facades\Form::password($name, $required, $attributes) !!}
    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
