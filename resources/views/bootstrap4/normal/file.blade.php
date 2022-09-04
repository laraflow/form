<div class="form-group">

    {!! \Form::label($name, $label, $required) !!}

    @php $attributes['class'][] = 'custom-file-input'; @endphp
    @php $attributes['id'] = $name; @endphp

    <div class="custom-file">
        {!! \Form::label('', 'Choose file...', false, [
            'class' => 'custom-file-label',
            'id' => $name . '_file_label',
        ]) !!}
        {!! \Form::file($name, $required, $attributes) !!}
    </div>
    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function() {
            var field = document.getElementById('{{ $name . '_file_label' }}');
            field.classList.add("selected");
            field.innerHTML = this.value.split("\\").pop();
        });
    </script>

    {!! \Form::error($name . '[]') !!}
</div>
