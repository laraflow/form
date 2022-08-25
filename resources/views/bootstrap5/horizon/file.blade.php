{!! \Laraflow\Form\Facades\Form::hLabel($name, $label, $required) !!}

@php
$options = ['class' => 'form-control col-md-10'];

if (isset($required) && $required == true) {
    $options['required'] = 'required';
}
@endphp

{!! \Laraflow\Form\Facades\Form::file($name, $default, $required, $attributes) !!}
