<div class="form-group @if (isset($attributes['inline']) && $attributes['inline'] == true) form-check-inline @endif">
    @php
        $options = ['class' => 'form-check-input', 'id' => $name];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
        
        if (isset($attributes['inline'])) {
            unset($attributes['inline']);
        }
        
    @endphp

    <div class="form-check">
        {!! \Laraflow\Form\Facades\Form::checkbox($name, $default, $checked, $required, $attributes) !!}
        {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, ['class' => 'form-check-label']) !!}
        {!! \Laraflow\Form\Facades\Form::error($name) !!}
    </div>
</div>
