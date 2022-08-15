<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select' . ($errors->has($name) ? ' is-invalid' : null)];

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
        {!! \Hafijul233\Form\Facades\Form::selectMonth($name, $selected, array_merge($options, $attributes)) !!}

        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>
</div>
