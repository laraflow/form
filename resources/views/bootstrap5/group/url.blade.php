<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php


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
        {!! \Hafijul233\Form\Facades\Form::url($name, $default, array_merge($options, $attributes)) !!}

        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>
</div>
