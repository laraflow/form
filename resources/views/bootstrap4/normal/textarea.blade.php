@extends('form::bootstrap4.normal.layout')

@section('element')
    @php $attributes['rows'] = $attributes['rows'] ?? 3; @endphp
    {!! \Hafijul233\Form\Facades\Form::textarea($name, $default, $required, $attributes) !!}
@endsection
