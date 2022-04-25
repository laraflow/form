<?php


namespace Hafijul233\Form\Providers\Components;

use Collective\Html\FormFacade as Form;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

/**
 * Class GroupFieldServiceProvider
 * @package Hafijul233\Form\Providers\Components
 */
class GroupFieldServiceProvider extends ServiceProvider
{
    /**
     * @var array $config
     */
    public $config = [];

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {

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
     *  | icon |       Field                |
     *  +-----------------------------------+
     *
     *                  OR
     * Label
     *  +-----------------------------------+
     *  |              Field         | icon |
     *  +-----------------------------------+
     */
    public function boot()
    {
        $style = Config::get('form.style');

        if ($style == null) {
            $style = 'bootstrap4';
        }

        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gText', 'form::' . $style . '.group.text', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);
        /**
         * @parem string $name
         * @parem string $label
         * @parem mixed $default
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gEmail', 'form::' . $style . '.group.email', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gPassword', 'form::' . $style . '.group.password', ['name', 'label', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gSearch', 'form::' . $style . '.group.search', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gTel', 'form::' . $style . '.group.tel', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gNumber', 'form::' . $style . '.group.number', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gDate', 'form::' . $style . '.group.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gUrl', 'form::' . $style . '.group.url', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * @parem string $name
         * @parem string $label
         * @parem bool $required
         * @parem array $attributes
         *
         * @return HtmlString
         */
        Form::component('gTextarea', 'form::' . $style . '.group.textarea', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * Create a select box field.
         *
         * @param string $name
         * @param array $list
         * @param string|bool $selected
         * @param array $selectAttributes
         * @param array $optionsAttributes
         * @param array $optgroupsAttributes
         */
        Form::component('gSelect', 'form::' . $style . '.group.select', ['name', 'label', 'data', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * Create a select box field.
         *
         * @param string $name
         * @param array $list
         * @param string|bool $selected
         * @param array $selectAttributes
         * @param array $optionsAttributes
         * @param array $optgroupsAttributes
         */
        Form::component('gSelectMulti', 'form::' . $style . '.group.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * Create a select range field.
         *
         * @param string $name
         * @param string $begin
         * @param string $end
         * @param string $selected
         * @param array $options
         *
         * @return HtmlString
         */
        Form::component('gSelectRange', 'form::' . $style . '.group.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);


        /**
         * Create a select day field.
         *
         * @param string $name
         * @param string $selected
         * @param array $options
         * @param string $format
         *
         * @return HtmlString
         */
        Form::component('gSelectDay', 'form::' . $style . '.group.selectday', ['name', 'label', 'selected' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        /**
         * Create a select month field.
         *
         * @param string $name
         * @param string $selected
         * @param array $options
         * @param string $format
         *
         * @return HtmlString
         */
        Form::component('gSelectMonth', 'form::' . $style . '.group.selectmonth', ['name', 'label', 'selected' => date('m'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

    }
}
