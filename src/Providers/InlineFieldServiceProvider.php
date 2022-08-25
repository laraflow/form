<?php

namespace Laraflow\Form\Providers;

use Laraflow\Form\Facades\Form;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;
use Illuminate\View\Compilers\BladeCompiler;

/**
 * Class InlineFieldServiceProvider
 */
class InlineFieldServiceProvider extends ServiceProvider
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
                    return "<?php echo \Laraflow\Form\Facades\Form::{$method}({$expression}); ?>";
                });
            }
        });
    }

    /**
     * Load All Inline Bootstrap Style Forms
     *
     * Example:
     *
     *  +-----------------------------------+
     *  |       Placeholder Title           |
     *  +-----------------------------------+
     */
    public function boot()
    {
        $style = Config::get('form.style', 'bootstrap4');

        Form::component('iText', 'form::'.$style.'.inline.text', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iEmail', 'form::'.$style.'.inline.email', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iPassword', 'form::'.$style.'.inline.password', ['name', 'label', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iRange', 'form::'.$style.'.inline.range', ['name', 'label', 'default' => null, 'required' => false, 'attributes' => []]);

        Form::component('iSearch', 'form::'.$style.'.inline.search', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iTel', 'form::'.$style.'.inline.tel', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iNumber', 'form::'.$style.'.inline.number', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iDate', 'form::'.$style.'.inline.date', ['name', 'label', 'default' => date('Y-m-d'), 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iUrl', 'form::'.$style.'.inline.url', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iFile', 'form::'.$style.'.inline.file', ['name', 'label', 'required' => false, 'attributes' => []]);

        Form::component('iImage', 'form::'.$style.'.inline.image', ['name', 'label', 'required' => false, 'preview' => ['preview' => false, 'height' => 100, 'default' => '/img/logo-app.png'], 'attributes' => ['accept' => 'image/*']]);

        Form::component('iTextarea', 'form::'.$style.'.inline.textarea', ['name', 'label', 'default' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iSelect', 'form::'.$style.'.inline.select', ['name', 'label', 'data' => [], 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iSelectMulti', 'form::'.$style.'.inline.selectmulti', ['name', 'label', 'data' => [], 'selected' => [], 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iSelectRange', 'form::'.$style.'.inline.selectrange', ['name', 'label', 'begin', 'end', 'selected', 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iSelectMonth', 'form::'.$style.'.inline.selectmonth', ['name', 'label', 'selected' => null, 'required' => false, 'icon' => null, 'position' => 'before', 'attributes' => []]);

        Form::component('iCheckbox', 'form::'.$style.'.inline.checkbox', ['name', 'label', 'values' => [], 'checked' => [], 'required' => false, 'attributes' => []]);

        Form::component('iRadio', 'form::'.$style.'.inline.radio', ['name', 'label', 'values' => [], 'checked' => null, 'required' => false, 'attributes' => []]);
    }
}
