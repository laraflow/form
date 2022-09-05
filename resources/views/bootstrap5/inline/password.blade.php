<div class="form-group">
    {!! \Form::label($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control', 'placeholder' => $attributes['placeholder'] ?? $label];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
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
        {!! \Form::password($name, $required, $attributes) !!}

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
    {!! \Form::error($name) !!}
</div>
