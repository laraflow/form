<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    @php $attributes['multiple'] = 'multiple' @endphp

    {!! \Hafijul233\Form\Facades\Form::select($name . '[]', $data, $selected, $required, $attributes) !!}
    {!! \Hafijul233\Form\Facades\Form::error($name . '[]') !!}
</div>
