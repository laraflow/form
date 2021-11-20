<?php

namespace Hafijul233\Form\Providers\Components;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

/**
 * Class HorizontalFieldServiceProvider
 * @package Hafijul233\Form\Providers\Components
 */
class HorizontalFieldServiceProvider extends ServiceProvider
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
        Form::component('hText', 'form::' . $style . '.horizon.text', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hEmail', 'form::' . $style . '.horizon.email', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hPassword', 'form::' . $style . '.horizon.password', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hRange', 'form::' . $style . '.horizon.range', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hSearch', 'form::' . $style . '.horizon.search', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hTel', 'form::' . $style . '.horizon.tel', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hNumber', 'form::' . $style . '.horizon.number', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hDate', 'form::' . $style . '.horizon.date', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hUrl', 'form::' . $style . '.horizon.url', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hFile', 'form::' . $style . '.horizon.file', ['name', 'label', 'required' => false, 'col_size' => 2, 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         */
        Form::component('hTextarea', 'form::' . $style . '.horizon.textarea', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);



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
        Form::component('hSelect', 'form::' . $style . '.horizon.select', ['name', 'label', 'data', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

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
        Form::component('hSelectMulti', 'form::' . $style . '.horizon.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'col_size' => 2, 'attributes' => []]);
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
        Form::component('hSelectRange', 'form::' . $style . '.horizon.selectrange', ['name', 'label', 'begin', 'end', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

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
        Form::component('hSelectMonth', 'form::' . $style . '.horizon.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);


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
        Form::component('hCheckbox', 'form::' . $style . '.horizon.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false,  'col_size' => 2, 'attributes' => []]);



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
        Form::component('hRadio', 'form::' . $style . '.horizon.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false,  'col_size' => 2, 'attributes' => []]);
    }
}
