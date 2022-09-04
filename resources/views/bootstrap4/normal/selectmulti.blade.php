<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    @php $attributes['multiple'] = 'multiple' @endphp

    {!! \Form::select($name, $data, $selected, $required, $attributes) !!}
    {!! \Form::error($name) !!}
</div>
