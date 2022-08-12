<?php

namespace Hafijul233\Form\Providers;

use Hafijul233\Form\Facades\Form;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\HtmlString;
use Illuminate\Support\ServiceProvider;

/**
 * Class GroupFieldServiceProvider
 */
class GroupFieldServiceProvider extends ServiceProvider
{
    /**
     * @var array
     */
    public $config = [];

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
        $style = Config::get('form.style', 'bootstrap4');

        Form::component('gText', 'form::'.$style.'.group.text', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gEmail', 'form::'.$style.'.group.email', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gPassword', 'form::'.$style.'.group.password', ['name', 'label', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gSearch', 'form::'.$style.'.group.search', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gTel', 'form::'.$style.'.group.tel', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gNumber', 'form::'.$style.'.group.number', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gDate', 'form::'.$style.'.group.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gUrl', 'form::'.$style.'.group.url', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gTextarea', 'form::'.$style.'.group.textarea', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gSelect', 'form::'.$style.'.group.select', ['name', 'label', 'data', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gSelectMulti', 'form::'.$style.'.group.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gSelectRange', 'form::'.$style.'.group.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gSelectDay', 'form::'.$style.'.group.selectday', ['name', 'label', 'selected' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('gSelectMonth', 'form::'.$style.'.group.selectmonth', ['name', 'label', 'selected' => date('m'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);
    }
}
