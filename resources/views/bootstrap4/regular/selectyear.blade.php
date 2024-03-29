<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    @if (isset($attributes['icon']))
        <div class="input-group">
            @if (isset($attributes['icon'][1]) && $attributes['icon'][1] == \Laraflow\Form\FormBuilder::ICON_PREPEND)
                <div class="input-group-prepend">
                    <div class="input-group-text">
                        @if (isset($attributes['icon'][0]))
                            <i class="{{ $attributes['icon'][0] }}"></i>
                        @endif
                    </div>
                </div>
            @endif

            {!! \Laraflow\Form\Facades\Form::selectYear($name, $begin, $end, $selected, $required, $attributes) !!}

            @if (isset($attributes['icon'][1]) && $attributes['icon'][1] == \Laraflow\Form\FormBuilder::ICON_APPEND)
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
        {!! \Laraflow\Form\Facades\Form::selectYear($name, $begin, $end, $selected, $required, $attributes) !!}
    @endif


    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
