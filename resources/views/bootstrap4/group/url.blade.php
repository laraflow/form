<div class="form-group">
    {!! \Form::nLabel($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
            $options['required'] = 'required'
    @endphp
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                @if(!empty($icon))
                    <i class="{{ $icon }}"></i>
                @endif
            </span>
        </div>
        {!! \Form::url($name, $default, array_merge($options, $attributes)) !!}

        {!! \Form::error($name) !!}
    </div>
</div>
