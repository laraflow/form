<?php

namespace Laraflow\Form;

use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Laraflow\Form\Providers\HorizontalFieldServiceProvider;
use Laraflow\Form\Providers\LabelServiceProvider;
use Laraflow\Form\Providers\RegularFieldServiceProvider;

/**
 * Class FormServiceProvider
 */
class FormServiceProvider extends ServiceProvider  implements DeferrableProvider
{
    /**
     * Boot the application events.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__ . '/../routes/web.php');

        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'form');

        $this->publishes([__DIR__ . '/../config/form.php' => config_path('form.php')], 'form-config');

        $this->publishes([__DIR__ . '/../resources/dist' => public_path('vendor/form')], 'form-assets');

        $this->publishes([__DIR__ . '/../resources/views' => resource_path('views/vendor/form')], 'form-view');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/form.php', 'form');

        $this->app->singleton('form', function ($app) {
            $form = new FormBuilder($app['view'], $app['session.store']->token(), $app['url'], $app['request']);

            return $form->setSessionStore($app['session.store']);
        });

        $this->app->alias('form', FormBuilder::class);

        $this->app->register(LabelServiceProvider::class);
        $this->app->register(HorizontalFieldServiceProvider::class);
        $this->app->register(RegularFieldServiceProvider::class);
    }

    public function provides()
    {
        return ['form', FormBuilder::class];
    }
}
