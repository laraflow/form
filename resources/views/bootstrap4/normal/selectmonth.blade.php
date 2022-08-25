<div class="form-group">

    {!! \Hafijul233\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    {!! \Hafijul233\Form\Facades\Form::selectMonth($name, $selected, $required, $attributes) !!}

    {!! \Hafijul233\Form\Facades\Form::error($name . '[]') !!}
</div>
