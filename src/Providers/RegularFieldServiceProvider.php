<?php

namespace Laraflow\Form\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Laraflow\Form\Facades\Form;

/**
 * Class NormalFieldServiceProvider
 *
 * @property static $directives = []
 *
 * @package Laraflow\Form\Providers
 */
class RegularFieldServiceProvider extends ServiceProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    public static $directives = [
         'nText',
         'nEmail',
         'nPassword',
         'nRange',
         'nSearch',
         'nTel',
         'nNumber',
         'nDate',
         'nUrl',
         'nFile',
         'nImage',
         'nTextarea',
         'nSelect',
         'nSelectMulti',
         'nSelectRange',
         'nSelectMonth',
         'nCheckbox',
         'nRadio'
    ];

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

        Form::component('nText', 'form::' . $style . '.regular.text', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nEmail', 'form::' . $style . '.regular.email', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nPassword', 'form::' . $style . '.regular.password', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('nRange', 'form::' . $style . '.regular.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nSearch', 'form::' . $style . '.regular.search', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nTel', 'form::' . $style . '.regular.tel', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nNumber', 'form::' . $style . '.regular.number', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nDate', 'form::' . $style . '.regular.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'attributes' => []]);

        Form::component('nUrl', 'form::' . $style . '.regular.url', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nFile', 'form::' . $style . '.regular.file', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('nImage', 'form::' . $style . '.regular.image', ['name', 'label', 'required' => false, 'preview' => ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'], 'attributes' => ['accept' => 'image/*']]);

        Form::component('nTextarea', 'form::' . $style . '.regular.textarea', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nSelect', 'form::' . $style . '.regular.select', ['name', 'label', 'data' => [], 'selected', 'required' => false, 'attributes' => []]);

        Form::component('nSelectMulti', 'form::' . $style . '.regular.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'attributes' => []]);

        Form::component('nSelectRange', 'form::' . $style . '.regular.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'attributes' => []]);

        Form::component('nSelectMonth', 'form::' . $style . '.regular.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'attributes' => []]);

        Form::component('nCheckbox', 'form::' . $style . '.regular.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'attributes' => []]);

        Form::component('nRadio', 'form::' . $style . '.regular.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false, 'attributes' => []]);
    }
}
