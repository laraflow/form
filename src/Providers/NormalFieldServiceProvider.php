<?php

namespace Laraflow\Form\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Laraflow\Form\Facades\Form;
use Laraflow\Form\Traits\BladeDirectiveTrait;

/**
 * Class NormalFieldServiceProvider
 *
 * @property static $directives = []
 *
 * @package Laraflow\Form\Providers
 */
class NormalFieldServiceProvider extends ServiceProvider
{
    use BladeDirectiveTrait;

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
        $this->registerBladeDirectives();
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

        Form::component('nText', 'form::' . $style . '.normal.text', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nEmail', 'form::' . $style . '.normal.email', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nPassword', 'form::' . $style . '.normal.password', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('nRange', 'form::' . $style . '.normal.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nSearch', 'form::' . $style . '.normal.search', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nTel', 'form::' . $style . '.normal.tel', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nNumber', 'form::' . $style . '.normal.number', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nDate', 'form::' . $style . '.normal.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'attributes' => []]);

        Form::component('nUrl', 'form::' . $style . '.normal.url', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nFile', 'form::' . $style . '.normal.file', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('nImage', 'form::' . $style . '.normal.image', ['name', 'label', 'required' => false, 'preview' => ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'], 'attributes' => ['accept' => 'image/*']]);

        Form::component('nTextarea', 'form::' . $style . '.normal.textarea', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('nSelect', 'form::' . $style . '.normal.select', ['name', 'label', 'data' => [], 'selected', 'required' => false, 'attributes' => []]);

        Form::component('nSelectMulti', 'form::' . $style . '.normal.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'attributes' => []]);

        Form::component('nSelectRange', 'form::' . $style . '.normal.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'attributes' => []]);

        Form::component('nSelectMonth', 'form::' . $style . '.normal.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'attributes' => []]);

        Form::component('nCheckbox', 'form::' . $style . '.normal.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'attributes' => []]);

        Form::component('nRadio', 'form::' . $style . '.normal.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false, 'attributes' => []]);
    }
}
