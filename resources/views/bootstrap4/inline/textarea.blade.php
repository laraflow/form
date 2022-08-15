<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null), 'rows' => 3];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    @if (!empty($icon))
        <div class="input-group">
            @if (isset($position) && $position == 'before')
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        @if (!empty($icon))
                            <span class="{{ $icon }}"></span>
                        @endif
                    </div>
                </div>
            @endif

            {!! \Hafijul233\Form\Facades\Form::textarea($name, $default, array_merge($options, $attributes)) !!}

            @if (isset($position) && $position == 'after')
                <div class="input-group-append">
                    <div class="input-group-text">
                        @if (!empty($icon))
                            <span class="{{ $icon }}"></span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    @else
        {!! \Hafijul233\Form\Facades\Form::textarea($name, $default, array_merge($options, $attributes)) !!}
    @endif
    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
