<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}

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
        {!! \Laraflow\Form\Facades\Form::select($name, config('form.days'), $selected, $required, $attributes) !!}

        {!! \Laraflow\Form\Facades\Form::error($name) !!}
    </div>
</div>
