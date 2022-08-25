<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    @php $attributes['rows'] = $attributes['rows'] ?? 3 @endphp
    {!! \Hafijul233\Form\Facades\Form::textarea($name, $default, $required, $attributes) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name . '[]') !!}
</div>
