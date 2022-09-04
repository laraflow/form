<div class="form-group">
    {!! \Form::label($name, $label, $required) !!}

    @php
        $options = ['class' => 'form-control custom-select'];

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    {!! \Form::selectRange($name, $begin, $end, $selected, $required, $attributes) !!}
    {!! \Form::error($name) !!}
</div>
