<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null)];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="input-group">
        @if (isset($position) && ($position = 'before'))
            <div class="input-group-prepend">
                <span class="input-group-text">
                    @if (!empty($icon))
                        <i class="{{ $icon }}"></i>
                    @endif
                </span>
            </div>
        @endif
        {!! \Form::number($name, $default, array_merge($options, $attributes)) !!}
        @if (isset($position) && ($position = 'after'))
            <div class="input-group-prepend">
                <span class="input-group-text">
                    @if (!empty($icon))
                        <i class="{{ $icon }}"></i>
                    @endif
                </span>
            </div>
        @endif
        {!! \Form::error($name) !!}
    </div>
</div>
