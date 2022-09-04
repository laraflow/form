<div class="{{ wrapper($attributes) }}">
    {!! \Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select'];

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
        {!! \Form::select($name, config('form.months'), $selected, $required, $attributes) !!}

        {!! \Form::error($name) !!}
    </div>
</div>
