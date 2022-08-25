<div class="form-group">

    {!! \Laraflow\Form\Facades\Form::label($name . '[]', $label, $required) !!}
    @php $attributes['class'][] = 'custom-select' @endphp
    {!! \Laraflow\Form\Facades\Form::select($name, $data, $selected, $required, $attributes) !!}
    {!! \Laraflow\Form\Facades\Form::error($name . '[]') !!}
</div>
