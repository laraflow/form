<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}
    @php
        $options = ['class' => 'form-control custom-file-input '];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="custom-file">
        {!! \Hafijul233\Form\Facades\Form::label('', 'Choose file...', false, [
            'class' => 'custom-file-label',
            'id' => $name . '_file_label',
        ]) !!}
        {!! \Hafijul233\Form\Facades\Form::file($name, $required, $attributes) !!}
        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>
    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function() {
            var field = document.getElementById('{{ $name . '_file_label' }}');
            field.classList.add("selected");
            field.innerHTML = this.value.split("\\").pop();
        });
    </script>
</div>
