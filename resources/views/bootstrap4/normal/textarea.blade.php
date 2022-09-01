<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}
    @php $attributes['rows'] = $attributes['rows'] ?? 3 @endphp
    {!! \Laraflow\Form\Facades\Form::textarea($name, $default, $required, $attributes) !!}

    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
