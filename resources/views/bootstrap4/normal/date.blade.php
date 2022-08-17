@extends('form::bootstrap4.normal.layout')

@section('element')
    <h1> {{ date('Y-m-d') }}</h1>
    {!! \Hafijul233\Form\Facades\Form::date($name, $default, $required, $attributes) !!}
@endsection
