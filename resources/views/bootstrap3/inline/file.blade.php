<div class="form-group">
    {!! \Hafijul233\Form\Facades\Form::fLabel($name, $label, $required, ['class' => 'd-block mb-2']) !!}
    <div class="custom-file">
        @php
            $options = ['class' => 'form-control', 'placeholder' => $attributes['placeholder'] ?? $label];

            if (isset($required) && $required == true) {
                $options['required'] = 'required';
            }
        @endphp
        @if (isset($position) && ($position = 'before'))
            <div class="input-group-prepend">
                <span class="input-group-text">
                    @if (!empty($icon))
                        <i class="{{ $icon }}"></i>
                    @endif
                </span>
            </div>
        @endif
        {!! \Hafijul233\Form\Facades\Form::file($name, $required,  $attributes) !!}
        @if (isset($position) && ($position = 'after'))
            <div class="input-group-prepend">
                <span class="input-group-text">
                    @if (!empty($icon))
                        <i class="{{ $icon }}"></i>
                    @endif
                </span>
            </div>
        @endif
        {!! \Hafijul233\Form\Facades\Form::label($name, $label, $required, ['class' => 'custom-file-label']) !!}
        {!! \Hafijul233\Form\Facades\Form::error($name) !!}
    </div>
</div>
