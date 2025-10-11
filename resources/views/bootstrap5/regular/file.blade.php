<div class="mb-3">

    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, ['class'=>'form-label']) !!}

    @php $attributes['class'][] = 'custom-file-input'; @endphp
    @php $attributes['id'] = $name; @endphp

    <div class="custom-file">
        {!! \Laraflow\Form\Facades\Form::label('', 'Choose file...', false, [
            'class' => 'custom-file-label',
            'id' => $name . '_file_label',
        ]) !!}
        {!! \Laraflow\Form\Facades\Form::file($name, $required, $attributes) !!}
    </div>
    {!! \Laraflow\Form\Facades\Form::hint($attributes) !!}
    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function() {
            var field = document.getElementById('{{ $name . '_file_label' }}');
            field.classList.add("selected");
            field.innerHTML = this.value.split("\\").pop();
        });
    </script>

    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
