<?php

namespace Laraflow\Form\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Laraflow\Form\Facades\Form;

/**
 * Class NormalFieldServiceProvider
 */
class RegularFieldServiceProvider extends ServiceProvider
{
    /**
     * Register Blade directives.
     *
     * @return void
     */
    public function register()
    {
    }

    /**
     * Load All Normal Bootstrap Style Forms
     *
     * Example:
     *
     * Label
     *  +-----------------------------------+
     *  |            Field                  |
     *  +-----------------------------------+
     */
    public function boot()
    {
        $style = Config::get('form.style', 'bootstrap4');

        Form::component('rText', 'form::'.$style.'.regular.text', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rEmail', 'form::'.$style.'.regular.email', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rPassword', 'form::'.$style.'.regular.password', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('rRange', 'form::'.$style.'.regular.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rSearch', 'form::'.$style.'.regular.search', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rTel', 'form::'.$style.'.regular.tel', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rNumber', 'form::'.$style.'.regular.number', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rDate', 'form::'.$style.'.regular.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'attributes' => []]);

        Form::component('rUrl', 'form::'.$style.'.regular.url', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rFile', 'form::'.$style.'.regular.file', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('rImage', 'form::'.$style.'.regular.image', ['name', 'label', 'required' => false, 'preview' => ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'], 'attributes' => ['accept' => 'image/*']]);

        Form::component('rTextarea', 'form::'.$style.'.regular.textarea', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('rSelect', 'form::'.$style.'.regular.select', ['name', 'label', 'data' => [], 'selected', 'required' => false, 'attributes' => []]);

        Form::component('rSelectMulti', 'form::'.$style.'.regular.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'attributes' => []]);

        Form::component('rSelectRange', 'form::'.$style.'.regular.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'attributes' => []]);

        Form::component('rSelectMonth', 'form::'.$style.'.regular.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'attributes' => []]);

        Form::component('rCheckbox', 'form::'.$style.'.regular.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'attributes' => []]);

        Form::component('rRadio', 'form::'.$style.'.regular.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false, 'attributes' => []]);
    }
}
