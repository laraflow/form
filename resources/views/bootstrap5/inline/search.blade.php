<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null), 'placeholder' => $attributes['placeholder'] ?? $label];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="input-group">
        <div class="input-group-prepend">
            <span class="input-group-text">
                @if (!empty($icon))
                    <i class="{{ $icon }}"></i>
                @endif
            </span>
        </div>
        {!! \Hafijul233\Form\Facades\Form::search($name, $default, array_merge($options, $attributes)) !!}

        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>
</div>
