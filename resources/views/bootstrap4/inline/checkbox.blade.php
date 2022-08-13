<div class="form-inline">

    {!! \Form::label($name . '[]', $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'custom-control-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];
        $msg = $errors->first($name) ?? null;
        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp

    @foreach($values as $value => $display)

        @php $id = $name . '-checkbox-' . $value; $options['id'] = $id @endphp

        <div class="custom-control custom-checkbox custom-control-inline">
            {!! \Form::checkbox($name . '[]', $value, in_array($value, $checked), array_merge($options, $attributes)) !!}

            {!! \Form::label($id, $display,false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Form::error($name . '[]') !!}
</div>
