<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL ), 'rows' => 3];



        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp

    {!! \Form::textarea($name, $default, array_merge($options, $attributes)) !!}

    {!! \Form::error($name) !!}
</div>
