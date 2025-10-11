<div class="form-group row">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required, [
        'class' => ['col-form-label col-sm-' . $col_size],
    ]) !!}
    @php $attributes['class'][] = 'custom-file-input'; @endphp
    <div class="col-sm-{{ 12 - $col_size }}">
        <div class="custom-file">
            {!! \Laraflow\Form\Facades\Form::label('', 'Choose file...', false, [
                'class' => 'custom-file-label',
                'id' => $name . '_file_label',
            ]) !!}
            {!! \Laraflow\Form\Facades\Form::file($name, $required, $attributes) !!}
            {!! \Laraflow\Form\Facades\Form::error($name) !!}
        </div>
        {!! \Laraflow\Form\Facades\Form::hint($attributes) !!}

        @if ($preview['preview'] ?? false)
            <div class="img-thumbnail mt-2 text-center">
                <img id="{{ $name }}_preview" src="{{ $preview['default'] }}"
                    height="{{ $preview['height'] ?? 90 }}">
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
</div>
