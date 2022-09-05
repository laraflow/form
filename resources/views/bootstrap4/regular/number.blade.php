<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}

    @if (isset($attributes['icon']))
        <div class="input-group">
            @if (isset($attributes['icon'][1]) && $attributes['icon'][1] == \Laraflow\Form\Builders\FormBuilder::ICON_PREPEND)
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        @if (isset($attributes['icon'][0]))
                            <i class="{{ $attributes['icon'][0] }}"></i>
                        @endif
                    </div>
                </div>
            @endif

            {!! \Form::number($name, $default, $required, $attributes) !!}

            @if (isset($attributes['icon'][1]) && $attributes['icon'][1] == \Laraflow\Form\Builders\FormBuilder::ICON_APPEND)
                <div class="input-group-append">
                    <div class="input-group-text">
                        @if (!empty($attributes['icon'][0]))
                            <i class="{{ $attributes['icon'][0] }}"></i>
                        @endif
                    </div>
                </div>
            @endif
        </div>
    @else
        {!! \Form::number($name, $default, $required, $attributes) !!}
    @endif


    {!! \Form::error($name) !!}
</div>
