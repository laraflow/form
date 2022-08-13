<div class="form-group">
    {!! \Form::nLabel($name, $label, $required, ['class' => 'sr-only d-none']) !!}

    @php
        $options = ['class' => 'form-control custom-select' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp

    @if(!empty($icon))
        <div class="input-group">
            @if(isset($position) && $position == 'before')
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        @if(!empty($icon))
                            <span class="{{ $icon }}"></span>
                        @endif
                    </div>
                </div>
            @endif

            {!! \Form::select($name, $data, $selected, array_merge($options, $attributes)) !!}

            @if(isset($position) && $position == 'after')
                <div class="input-group-append">
                    <div class="input-group-text">
                        @if(!empty($icon))
                            <span class="{{ $icon }}"></span>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    @else
        {!! \Form::select($name, $data, $selected, array_merge($options, $attributes)) !!}
    @endif
    {!! \Form::error($name) !!}
</div>
