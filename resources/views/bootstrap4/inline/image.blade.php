<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'sr-only d-none']) !!}
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
        {!! \Hafijul233\Form\Facades\Form::file($name, array_merge($options, $attributes)) !!}
        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>

    @if ($preview['preview'] ?? false)
        <div class="img-thumbnail mt-2 text-center">
            <img id="{{ $name }}_preview" src="{{ $preview['default'] }}" height="{{ $preview['height'] ?? 90 }}">
        </div>
        <script>
            document.getElementById("{{ $name }}").addEventListener("change", function() {
                var i = this;
                if (i.files && i.files[0]) {
                    var r = new FileReader();
                    r.onload = function(e) {
                        document.getElementById("{{ $name }}_preview").setAttribute('src', e.target.result);
                    };
                    r.readAsDataURL(i.files[0]);
                    document.getElementById("{{ $name }}_label").innerText = (i.files[0].name ??
                        "Choose a file");
                }
            });
        </script>
    @endif
    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function() {

            var fileName = this.value.split("\\").pop();

            var field = document.getElementById('{{ $name . '_file_label' }}');
            field.classList.add("selected");
            field.innerHTML = fileName;
        });
    </script>
</div>
