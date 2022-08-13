<div class="form-group">
    {!! \Form::nLabel($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL ), 'placeholder' => $attributes['placeholder'] ?? $label];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp

    {!! \Form::checkbox($name, $checked, array_merge($options, $attributes)) !!}

    {!! \Form::error($name) !!}
</div>
