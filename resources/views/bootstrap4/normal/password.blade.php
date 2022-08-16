@extends('form::bootstrap4.normal.layout')

@section('element')
    {!! \Hafijul233\Form\Facades\Form::password($name, $required, $attributes) !!}
@endsection
