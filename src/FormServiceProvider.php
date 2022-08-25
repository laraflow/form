<?php

namespace Laraflow\Form;

use Laraflow\Form\Builders\FormBuilder;
use Laraflow\Form\Providers\GroupFieldServiceProvider;
use Laraflow\Form\Providers\HorizontalFieldServiceProvider;
use Laraflow\Form\Providers\InlineFieldServiceProvider;
use Laraflow\Form\Providers\LabelServiceProvider;
use Laraflow\Form\Providers\NormalFieldServiceProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    protected $directives = ['error', 'open', 'model', 'close', 'token', 'label', 'input', 'text', 'password', 'hidden', 'email', 'tel', 'number', 'date', 'datetime', 'datetimeLocal', 'time', 'url', 'file', 'textarea', 'select', 'selectRange', 'selectYear', 'selectMonth', 'checkbox', 'radio', 'reset', 'image', 'color', 'submit', 'button', 'old'];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/../routes/web.php');

        $this->loadViewsFrom(__DIR__.'/../resources/views', 'form');

        $this->publishes([__DIR__.'/../config/form.php' => config_path('form.php')], 'form-config');

        $this->publishes([__DIR__.'/../resources/dist' => public_path('vendor/form')], 'form-assets');

        $this->publishes([__DIR__.'/../resources/views' => resource_path('views/vendor/form')], 'form-view');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/form.php', 'form');

        $this->app->singleton('form', function ($app) {
            $form = new FormBuilder($app['view'], $app['session.store']->token(), $app['url'], $app['request']);

            return $form->setSessionStore($app['session.store']);
        });

        $this->app->alias('form', FormBuilder::class);

        $this->registerComponentProviders();
    }

    protected function registerComponentProviders()
    {
        $this->app->register(LabelServiceProvider::class);

        $this->app->register(HorizontalFieldServiceProvider::class);

        $this->app->register(GroupFieldServiceProvider::class);

        $this->app->register(InlineFieldServiceProvider::class);

        $this->app->register(NormalFieldServiceProvider::class);

        $this->registerBladeDirectives();
    }

    /**
     * Register Blade directives.
     *
     * @return void
     */
    protected function registerBladeDirectives()
    {
        $this->app->afterResolving('blade.compiler', function (BladeCompiler $bladeCompiler) {
            $methods = get_class_methods(FormBuilder::class);

            foreach ($methods as $method) {
                if (in_array($method, $this->directives)) {
                    $snakeMethod = Str::snake($method);
                    $bladeCompiler->directive("form_{$snakeMethod}", function ($expression) use ($method) {
                        return "<?php echo \Laraflow\Form\Facades\Form::{$method}({$expression}); ?>";
                    });
                }
            }
        });
    }
}
