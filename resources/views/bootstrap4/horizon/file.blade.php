<div class="form-group row">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, [
        'class' => 'col-form-label col-sm-' . $col_size,
    ]) !!}
    @php
        $options = ['class' => 'form-control custom-file-input '];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
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
</div>
