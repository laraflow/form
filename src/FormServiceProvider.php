<?php

namespace Hafijul233\Form;

use Hafijul233\Form\Builders\FormBuilder;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Str;
use Illuminate\View\Compilers\BladeCompiler;

class FormServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Supported Blade Directives
     *
     * @var array
     */
    protected $directives = ['entities', 'decode', 'script', 'style', 'image', 'favicon', 'link', 'secureLink', 'linkAsset', 'linkSecureAsset', 'linkRoute', 'linkAction', 'mailto', 'email', 'ol', 'ul', 'dl', 'meta', 'tag', 'open', 'model', 'close', 'token', 'label', 'input', 'text', 'password', 'hidden', 'email', 'tel', 'number', 'date', 'datetime', 'datetimeLocal', 'time', 'url', 'file', 'textarea', 'select', 'selectRange', 'selectYear', 'selectMonth', 'getSelectOption', 'checkbox', 'radio', 'reset', 'image', 'color', 'submit', 'button', 'old'];

    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerConfig();
        $this->registerPublicAssets();
        $this->registerViews();
        $this->registerRoutes();
    }

    /**
     * Register config.
     *
     * @return void
     */
    protected function registerConfig()
    {
        $this->publishes([__DIR__ . '/../../config/form.php' => config_path('form.php')], 'form-config');

        $this->mergeConfigFrom(__DIR__ . '/../../config/form.php', 'form');
    }

    /**
     * Register Asset Publish Exports on public folder
     *
     * @return void
     */
    protected function registerPublicAssets()
    {
        $this->publishes([__DIR__ . '/../../resources/dist/assets' => public_path('vendor/form/assets')], 'form-assets');
    }

    /**
     * Register views.
     *
     * @return void
     */
    protected function registerViews()
    {
        $this->loadViewsFrom(__DIR__ . '/../../resources/views', 'form');

        $this->publishes([__DIR__ . '/../../resources/views' => resource_path('views/vendor/form')], 'form-view');
    }

    /**
     * Register Route for testing form Examples
     *
     * @return void
     */
    protected function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__ . '/../../routes/web.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        // Register the form builder instance.
        $this->app->singleton('form', function ($app) {
            $form = new FormBuilder($app['view'], $app['session.store']->token(), $app['url'], $app['request']);

            return $form->setSessionStore($app['session.store']);
        });

        $this->app->alias('form', FormBuilder::class);

        $this->app->register(ComponentServiceProvider::class);

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
            $namespaces = [
                'Form' => get_class_methods(FormBuilder::class),
            ];

            foreach ($namespaces as $namespace => $methods) {
                foreach ($methods as $method) {
                    if (in_array($method, $this->directives)) {
                        $snakeMethod = Str::snake($method);
                        $directive = strtolower($namespace) . '_' . $snakeMethod;

                        $bladeCompiler->directive($directive, function ($expression) use ($namespace, $method) {
                            return "<?php echo $namespace::$method($expression); ?>";
                        });
                    }
                }
            }
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides(): array
    {
        return ['form', FormBuilder::class];
    }
}
