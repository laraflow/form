<div class="{{ wrapper($attributes) }}">
    {!! \Form::label($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php

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

            {!! \Form::url($name, $default, $required, $attributes) !!}

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
        {!! \Form::url($name, $default, $required, $attributes) !!}
    @endif
    {!! \Form::error($name) !!}
</div>
