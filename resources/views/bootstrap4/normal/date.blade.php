@extends('form::bootstrap4.normal.layout')

@section('element')
    {!! \Hafijul233\Form\Facades\Form::date($name, $default, $required, $attributes) !!}
@endsection
