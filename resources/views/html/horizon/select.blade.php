<div class="form-group row">
    {!! \Hafijul233\Form\Facades\Form::hLabel($name, $label, $required, $col_size) !!}

    @php
        $field_size = abs(12 - $col_size);
        $options = ['class' => 'form-control custom-select'];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-md-{{ $field_size }}">
        {!! \Hafijul233\Form\Facades\Form::select($name, $data, $selected, array_merge($options, $attributes)) !!}

        {!! \Hafijul233\Form\Facades\Form::hError($name, $msg) !!}
    </div>
</div>
