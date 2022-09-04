<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    {!! \Form::selectRange($name, $begin, $end, $selected, $required, $attributes) !!}
    {!! \Form::error($name . '[]') !!}
</div>
