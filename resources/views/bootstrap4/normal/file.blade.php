<div class="form-group">
    {!! Form::nLabel($name, $label, $required) !!}
    @php
        $options = ['class' => 'form-control custom-file-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required';
    @endphp
    <div class="custom-file">
        {!! Form::nLabel('','Choose file...', false, ['class' => 'custom-file-label', 'id' => $name .'_file_label']) !!}
        {!! Form::file($name, array_merge($options, $attributes)) !!}
        {!! Form::nError($name, $msg) !!}
    </div>
    <script>
        document.getElementById('{{$name}}').addEventListener('change', function () {
            var field = document.getElementById('{{$name .'_file_label'}}');
            field.classList.add("selected");
            field.innerHTML = this.value.split("\\").pop();
        });
    </script>
</div>
