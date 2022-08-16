@extends('form::bootstrap4.normal.layout')

@section('element')
    @php $attributes['class'][] = 'custom-control-input'; @endphp
    @foreach ($values as $value => $display)
        @php $options['id'] = $name . '-checkbox-' . $value; @endphp

        <div class="custom-control custom-checkbox">
            {!! \Hafijul233\Form\Facades\Form::checkbox(
                $name . '[]',
                $value,
                in_array($value, $checked),
                $required,  $attributes,
            ) !!}

            {!! \Hafijul233\Form\Facades\Form::label($id, $display, false, ['class' => 'custom-control-label']) !!}
        </div>
    @endforeach
@endsection

