<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required) !!}
    @yield('element')
    {!! \Hafijul233\Form\Facades\Form::error($name) !!}
</div>
