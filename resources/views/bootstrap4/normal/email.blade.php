@extends('form::bootstrap4.normal.layout')

@section('element')
    {!! \Hafijul233\Form\Facades\Form::email($name, $default, $required, $attributes) !!}
@endsection
