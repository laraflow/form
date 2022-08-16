@extends('form::bootstrap4.normal.layout')

@section('element')
    @php $attributes['class'][] = 'custom-file-input'; @endphp
    <div class="custom-file">
        {!! \Hafijul233\Form\Facades\Form::label('', 'Choose file...', false, [
            'class' => 'custom-file-label',
            'id' => $name . '_file_label',
        ]) !!}
        {!! \Hafijul233\Form\Facades\Form::file($name, $required, $attributes) !!}
    </div>
    <script>
        document.getElementById('{{ $name }}').addEventListener('change', function() {
            var field = document.getElementById('{{ $name . '_file_label' }}');
            field.classList.add("selected");
            field.innerHTML = this.value.split("\\").pop();
        });
    </script>
@endsection
