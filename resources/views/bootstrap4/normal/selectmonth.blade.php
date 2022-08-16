@extends('form::bootstrap4.normal.layout')

@section('element')
    @php $attributes['class'][] = 'custom-select'; @endphp
    {!! \Hafijul233\Form\Facades\Form::selectMonth($name, $selected, $required, $attributes) !!}
@endsection
