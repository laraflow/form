<div class="form-group row">
    {!! \Form::nLabel($name, $label, $required, ['class' => 'col-form-label col-sm-' . $col_size]) !!}
    @php
        $options = ['class' => 'form-control custom-file-input ' . ($errors->has($name) ? ' is-invalid' : NULL )];

        $msg = $errors->first($name) ?? null;

        if(isset($required) && $required == true)
        $options['required'] = 'required'
    @endphp
    <div class="col-sm-{{ (12-$col_size) }}">
        <div class="custom-file">
            {!! \Form::nLabel('','Choose file...', false, ['class' => 'custom-file-label', 'id' => $name .'_file_label']) !!}
            {!! \Form::file($name, array_merge($options, $attributes)) !!}
            {!! \Form::error($name) !!}
        </div>

        @if(($preview['preview'] ?? false))
            <div class="img-thumbnail mt-2 text-center">
                <img id="{{$name}}_preview" src="{{ $preview['default'] }}"
                     height="{{ ($preview['height'] ?? 90) }}">
            </div>
            <script>
                document.getElementById("{{$name}}").addEventListener("change", function () {
                    var i = this;
                    if (i.files && i.files[0]) {
                        var r = new FileReader();
                        r.onload = function (e) {
                            document.getElementById("{{$name}}_preview").setAttribute('src', e.target.result);
                        };
                        r.readAsDataURL(i.files[0]);
                        document.getElementById("{{$name}}_label").innerText = (i.files[0].name ?? "Choose a file");
                    }
                });
            </script>
        @endif
        <script>
            document.getElementById('{{$name}}').addEventListener('change', function () {

                var fileName = this.value.split("\\").pop();

                var field = document.getElementById('{{$name .'_file_label'}}');
                field.classList.add("selected");
                field.innerHTML = fileName;
            });
        </script>
    </div>
</div>
