<?php

namespace Hafijul233\Form\Providers\Components;

use Collective\Html\FormFacade as Form;
use Collective\Html\HtmlFacade as Html;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;

/**
 * Class LabelServiceProvider
 */
class LabelServiceProvider extends ServiceProvider
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
     * Loading All Label Style
     */
    public function boot()
    {
        //Labels
        Form::macro('nLabel', function ($name, $value, $required = false, $options = []) {
            if ($required) {
                $value .= '<span style="color: #dc3545; font-weight:700">*</span>';
            }

            return Form::label($name, $value, $options, false);
        });

        Form::macro('hLabel', function ($name, $value, $required = false, $col_size = 2, $options = []) {
            if ($required) {
                $value .= '<span style="color: #dc3545; font-weight:700">*</span>';
            }

            return Form::label($name, $value, array_merge(['class' => "col-md-$col_size col-form-label"], $options), false);
        });

        Form::macro('fLabel', function ($name, $value, $required = false, $options = []) {
            if ($required) {
                $value .= '<span style="color: #dc3545; font-weight:700">*</span>';
            }

            return str_replace('label', 'span', Form::label($name, $value, $options, false));
        });

        //Errors
        Form::macro('nError', function ($name, $msg = null) {
            return '<span id="'.$name.'-error" class="invalid-feedback">'.$msg.'</span>';
        });

        Form::macro('hError', function ($name, $msg = null) {
            return '<span id="'.$name.'-error" class="invalid-feedback">'.$msg.'</span>';
        });

        Form::macro('fError', function ($name, $msg = null) {
            return '<span id="'.$name.'-error" class="invalid-feedback">'.$msg.'</span>';
        });

        //Actions
        Form::macro('nSubmit', function ($name, $value, $options = []) {
            $attributes = array_merge($options, ['class' => 'btn btn-primary fw-bold', 'name' => $name, 'type' => 'submit']);

            return Form::button('<i class="mdi mdi-check-bold  fw-bold"></i>&nbsp;&nbsp;'.$value, $attributes);
        });

        Form::macro('nCancel', function ($title, $options = []) {
            $attributes = array_merge($options, ['class' => 'btn btn-danger fw-bold']);

            return Html::link(URL::previous(), '<i class="mdi mdi-close-outline fw-bolder"></i>&nbsp;&nbsp;'.$title, $attributes, null, false);
        });
    }
}
