<div class="form-group">
    {!! \Laraflow\Form\Facades\Form::label($name, $label, $required) !!}
    @php
        $options = ['class' => 'form-control custom-select '];
        
        if (isset($required) && $required == true) {
            $options['required'] = 'required';
        }
    @endphp

    <div class="input-group">
        @if (isset($position) && $position == 'before')
            <div class="input-group-prepend">
                <div class="input-group-text">
                    @if (!empty($icon))
                        <span class="{{ $icon }}"></span>
                    @endif
                </div>
            </div>
        @endif

        {!! \Laraflow\Form\Facades\Form::select($name, $data, $selected, $required, $attributes) !!}

        @if (isset($position) && $position == 'after')
            <div class="input-group-append">
                <div class="input-group-text">
                    @if (!empty($icon))
                        <span class="{{ $icon }}"></span>
                    @endif
                </div>
            </div>
        @endif
    </div>
    {!! \Laraflow\Form\Facades\Form::error($name) !!}
</div>
