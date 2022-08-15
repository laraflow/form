<div class="custom-control custom-radio">
    <input type="radio" id="customRadio1" name="customRadio" class="custom-control-input" checked>
    <label class="custom-control-label" for="customRadio1">Custom radio</label>
</div>
<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control' . ($errors->has($name) ? ' is-invalid' : null)];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Hafijul233\Form\Facades\Form::radio($name, $checked, array_merge($options, $attributes)) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
