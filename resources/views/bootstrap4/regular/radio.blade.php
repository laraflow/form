<div class="form-group">
    @if(!empty($label))
        {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, ['class' => $inline ? ['custom-control-inline'] : []]) !!}
    @endif
    {!! \Laraflow\Form\Facades\Form::hint($attributes) !!}
    @php $attributes['class'][] = 'custom-control-input' @endphp

    @foreach ($values ?? [] as $value => $display)
        @php $attributes['id'] = $name . '-radio-' . $value @endphp

        <div @class(['custom-control custom-radio', 'custom-control-inline' => $inline])>
            {!! \Laraflow\Form\Facades\Form::radio($name, $value, $value == $checked, $required, $attributes) !!}

            {!! \Laraflow\Form\Facades\Form::label($attributes['id'], $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach
    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
