<?php

namespace Hafijul233\Form\Providers;

use Hafijul233\Form\Facades\Form;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

/**
 * Class HorizontalFieldServiceProvider
 */
class HorizontalFieldServiceProvider extends ServiceProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    protected $directives = ['hlabel' => 'hLabel', 'flabel' => 'fLabel'];

    /**
     * Register Blade directives.
     *
     * @return void
     */
    public function register()
    {
        $this->registerBladeDirectives();
    }

    protected function registerBladeDirectives()
    {
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {


            foreach ($this->directives as $directive => $method) {
                $bladeCompiler->directive("form_{$directive}", function ($expression) use ($method) {
                    return "<?php echo \Hafijul233\Form\Facades\Form::{$method}({$expression}); ?>";
                });
            }
        });
    }


    public function boot()
    {
        $style = Config::get('form.style', 'bootstrap4');

        Form::component('hText', 'form::'.$style.'.horizon.text', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hEmail', 'form::'.$style.'.horizon.email', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hPassword', 'form::'.$style.'.horizon.password', ['name', 'label', 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hRange', 'form::'.$style.'.horizon.range', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hSearch', 'form::'.$style.'.horizon.search', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hTel', 'form::'.$style.'.horizon.tel', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hNumber', 'form::'.$style.'.horizon.number', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hDate', 'form::'.$style.'.horizon.date', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hUrl', 'form::'.$style.'.horizon.url', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hFile', 'form::'.$style.'.horizon.file', ['name', 'label', 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hImage', 'form::'.$style.'.horizon.image', ['name', 'label', 'required' => false, 'col_size' => 2, 'preview' => ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'], 'attributes' => ['accept' => 'image/*']]);

        Form::component('hTextarea', 'form::'.$style.'.horizon.textarea', ['name', 'label', 'default' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hSelect', 'form::'.$style.'.horizon.select', ['name', 'label', 'data', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hSelectMulti', 'form::'.$style.'.horizon.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hSelectRange', 'form::'.$style.'.horizon.selectrange', ['name', 'label', 'begin', 'end', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hSelectMonth', 'form::'.$style.'.horizon.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hCheckbox', 'form::'.$style.'.horizon.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'col_size' => 2, 'attributes' => []]);

        Form::component('hRadio', 'form::'.$style.'.horizon.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false, 'col_size' => 2, 'attributes' => []]);
    }
}
