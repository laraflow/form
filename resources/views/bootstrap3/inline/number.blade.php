<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, ['class' => 'd-none']) !!}

    @php
        $options = ['class' => 'form-control', 'placeholder' => $attributes['placeholder'] ?? $label];

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
        {!! \Laraflow\Form\Facades\Form::number($name, $default, $required, $attributes) !!}
        @if (isset($position) && ($position = 'after'))
            <div class="input-group-prepend">
                <span class="input-group-text">
                    @if (!empty($icon))
                        <i class="{{ $icon }}"></i>
                    @endif
                </span>
            </div>
        @endif
        {!! \Laraflow\Form\Facades\Form::error($name) !!}
    </div>
</div>
