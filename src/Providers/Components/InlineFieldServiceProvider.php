<?php

namespace Hafijul233\Form\Providers\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

/**
 * Class InlineFieldServiceProvider
 * @package Hafijul233\Form\Providers\Components
 */
class InlineFieldServiceProvider extends ServiceProvider
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
     * Load All Inline Bootstrap Style Forms
     *
     * Example:
     *
     *  +-----------------------------------+
     *  |            Field                  |
     *  +-----------------------------------+
     */
    public function boot()
    {
        $style = Config::get('form.style');
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iText', 'form::' . $style . '.inline.text', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iEmail', 'form::' . $style . '.inline.email', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iPassword', 'form::' . $style . '.inline.password', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iRange', 'form::' . $style . '.inline.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iSearch', 'form::' . $style . '.inline.search', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iTel', 'form::' . $style . '.inline.tel', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iNumber', 'form::' . $style . '.inline.number', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iDate', 'form::' . $style . '.inline.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iUrl', 'form::' . $style . '.inline.url', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iFile', 'form::' . $style . '.inline.file', ['name', 'label', 'required' => false,'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iImage', 'form::' . $style . '.inline.image', ['name', 'label', 'required' => false, 'preview' => ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'],'attributes' => ['accept' => 'image/*']]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('iTextarea', 'form::' . $style . '.inline.textarea', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);



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
        Form::component('iSelect', 'form::' . $style . '.inline.select', ['name', 'label', 'data' => [], 'selected', 'required' => false, 'attributes' => []]);

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
        Form::component('iSelectMulti', 'form::' . $style . '.inline.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'attributes' => []]);

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
        Form::component('iSelectRange', 'form::' . $style . '.inline.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'attributes' => []]);


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
        Form::component('iSelectMonth', 'form::' . $style . '.inline.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'attributes' => []]);


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
        Form::component('iCheckbox', 'form::' . $style . '.inline.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'attributes' => []]);



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
        Form::component('iRadio', 'form::' . $style . '.inline.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false, 'attributes' => []]);

    }
}
