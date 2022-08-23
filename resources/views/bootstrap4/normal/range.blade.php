<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    @php $attributes['class'][] = 'custom-file-input custom-range' @endphp

    {!! \Hafijul233\Form\Facades\Form::range($name, $default, $required, $attributes) !!}

    @if (isset($attributes['min']) && isset($attributes['max']))
        <div class="d-flex justify-content-between">
            <div class="font-weight-bolder">{{ $attributes['min'] }}</div>
            <div class="font-weight-bolder">{{ $attributes['max'] }}</div>
        </div>
    @endif
    <div class="form-group">

        {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}
