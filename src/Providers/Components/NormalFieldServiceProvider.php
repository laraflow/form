<?php

namespace Hafijul233\Form\Providers\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class NormalFieldServiceProvider extends ServiceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [];
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
        $style= Config::get('form.style');
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nText', 'form::' . $style . '.normal.text', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nEmail', 'form::' . $style . '.normal.email', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nPassword', 'form::' . $style . '.normal.password', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nRange', 'form::' . $style . '.normal.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nSearch', 'form::' . $style . '.normal.search', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nTel', 'form::' . $style . '.normal.tel', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nNumber', 'form::' . $style . '.normal.number', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nDate', 'form::' . $style . '.normal.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nUrl', 'form::' . $style . '.normal.url', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nFile', 'form::' . $style . '.normal.file', ['name', 'label', 'required' => false,'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nImage', 'form::' . $style . '.normal.image', ['name', 'label', 'default' => null, 'required' => false, 'preview' => [false, 100, '/img/logo-app.png'],'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('nTextarea', 'form::' . $style . '.normal.textarea', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);



        /**
         * Create a select box field.
         *
         * @param  string $name
         * @param  array  $list
         * @param  string|bool $selected
         * @param  array  $selectAttributes
         * @param  array  $optionsAttributes
         * @param  array  $optgroupsAttributes
         */
        Form::component('nSelect', 'form::' . $style . '.normal.select', ['name', 'label', 'data', 'selected', 'required' => false, 'attributes' => []]);

        /**
         * Create a select range field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return HtmlString
         */
        Form::component('nSelectRange', 'form::' . $style . '.normal.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'attributes' => []]);


        /**
         * Create a select year field.
         *
         * @param  string $name
         * @param  string $begin
         * @param  string $end
         * @param  string $selected
         * @param  array  $options
         *
         * @return mixed
         */
        Form::component('nSelectYear', 'form::' . $style . '.normal.selectyear', ['name', 'label', 'begin', 'end', 'selected' => date('Y'), 'required' => false, 'attributes' => []]);


        /**
         * Create a select month field.
         *
         * @param  string $name
         * @param  string $selected
         * @param  array  $options
         * @param  string $format
         *
         * @return HtmlString
         */
        Form::component('nSelectMonth', 'form::' . $style . '.normal.selectmonth', ['name', 'label', 'selected' => date('m'), 'required' => false, 'attributes' => []]);


        /**
         * Create a checkbox input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return HtmlString
         */
        Form::component('nCheckbox', 'form::' . $style . '.normal.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'attributes' => []]);



        /**
         * Create a radio button input field.
         *
         * @param  string $name
         * @param  mixed  $value
         * @param  bool   $checked
         * @param  array  $options
         *
         * @return HtmlString
         */
        Form::component('nRadio', 'form::' . $style . '.normal.radio', ['name', 'label', 'checked', 'required' => false, 'attributes' => []]);
    }
}
