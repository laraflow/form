@extends('form::bootstrap4.normal.layout')

@section('element')
    {!! \Hafijul233\Form\Facades\Form::url($name, $default, $required,  $attributes) !!}
@endsection

