<div class="form-group row">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, [
        'class' => 'col-form-label col-sm-' . $col_size,
    ]) !!}

    @php
        $options = ['class' => 'form-control custom-select', 'multiple' => 'multiple'];
        $options['id'] = $name;

        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        {!! \Laraflow\Form\Facades\Form::select($name, $data, $selected, $required, $attributes) !!}
        {!! \Laraflow\Form\Facades\Form::hint($attributes) !!}
        {!! \Laraflow\Form\Facades\Form::error($name) !!}
    </div>
</div>
