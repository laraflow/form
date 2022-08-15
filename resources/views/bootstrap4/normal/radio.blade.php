<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'custom-control-input '];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    @foreach ($values as $value => $display)
        @php
            $id = $name . '-radio-' . $value;
            $options['id'] = $id;
        @endphp

        <div class="custom-control custom-radio">
            {!! \Hafijul233\Form\Facades\Form::radio($name, $value, $value == $checked, array_merge($options, $attributes)) !!}

            {!! \Hafijul233\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach

    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
