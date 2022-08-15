<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null)];
        
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
        {!! \Hafijul233\Form\Facades\Form::email($name, $default, array_merge($options, $attributes)) !!}

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
    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
