@extends('form::bootstrap4.normal.layout')

@section('element')
    @php $attributes['class'][] = 'custom-select'; @endphp
    @php $attributes['multiple'] = 'multiple'; @endphp

    {!! \Hafijul233\Form\Facades\Form::select($name . '[]', $data, $selected, $required,  $attributes) !!}
@endsection

