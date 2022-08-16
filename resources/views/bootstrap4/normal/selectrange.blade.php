@extends('form::bootstrap4.normal.layout')

@section('element')
    @php $attributes['class'][] = 'custom-select'; @endphp
    {!! \Hafijul233\Form\Facades\Form::selectRange($name, $begin, $end, $selected, $required, $attributes) !!}
@endsection
