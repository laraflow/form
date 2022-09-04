<?php

namespace Laraflow\Form\Providers;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;
use Laraflow\Form\Facades\Form;
use Laraflow\Form\Traits\BladeDirectiveTrait;

/**
 * Class LabelServiceProvider
 *
 * @property static $directives = []
 *
 * @package Laraflow\Form\Providers
 */
class LabelServiceProvider extends ServiceProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    public static $directives = ['hLabel', 'fLabel'];

    /**
     * Register Blade directives.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Loading All Label Style
     */
    public function boot()
    {
        Form::macro('hLabel', function ($name, $value, $required = false, $options = []) {
            $col_size = Config::get('form.horizon_label_size', 2);

            if (isset($options['col_size'])) {
                $col_size = $options['col_size'];
                unset($options['col_size']);
            }

            return Form::label($name, $value, $required, array_merge(['class' => "col-md-{$col_size} col-form-label"], $options), false);
        });

        Form::macro('fLabel', function ($name, $value, $required = false, $options = []) {
            return str_replace('label', 'span', Form::label($name, $value, $required, $options, false));
        });

        /*        Form::macro('nCancel', function ($title, $options = []) {
                    $attributes = array_merge($options, ['class' => 'btn btn-danger fw-bold']);

                    return Html::link('<i class="mdi mdi-close-outline fw-bolder"></i>&nbsp;&nbsp;' . $title, $attributes, null, false);
                });*/
    }
}
