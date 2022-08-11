<?php

namespace Hafijul233\Form\Providers;

use Hafijul233\Form\Providers\Components\GroupFieldServiceProvider;
use Hafijul233\Form\Providers\Components\HorizontalFieldServiceProvider;
use Hafijul233\Form\Providers\Components\InlineFieldServiceProvider;
use Hafijul233\Form\Providers\Components\LabelServiceProvider;
use Hafijul233\Form\Providers\Components\NormalFieldServiceProvider;
use Illuminate\Support\ServiceProvider;

class FormServiceProvider extends ServiceProvider
{
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
        $this->publishes([__DIR__.'/../../config/form.php' => config_path('form.php')], 'form-config');

        $this->mergeConfigFrom(__DIR__.'/../../config/form.php', 'form');
    }

    /**
     * Register Asset Publish Exports on public folder
     *
     * @return void
     */
    public function registerPublicAssets()
    {
        $this->publishes([__DIR__.'/../../resources/dist/assets' => public_path('vendor/form/assets')], 'form-assets');
    }

    /**
     * Register views.
     *
     * @return void
     */
    public function registerViews()
    {
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'form');

        $this->publishes([__DIR__.'/../../resources/views' => resource_path('views/vendor/form')], 'form-view');
    }

    /**
     * Register Route for testing form Examples
     *
     * @return void
     */
    public function registerRoutes()
    {
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->register(LabelServiceProvider::class);
        $this->app->register(HorizontalFieldServiceProvider::class);
        $this->app->register(GroupFieldServiceProvider::class);
        $this->app->register(InlineFieldServiceProvider::class);
        $this->app->register(NormalFieldServiceProvider::class);
    }
}
