<?php

namespace Hafijul233\Form;

use Hafijul233\Form\Facades\Form;
use Hafijul233\Form\Providers\GroupFieldServiceProvider;
use Hafijul233\Form\Providers\HorizontalFieldServiceProvider;
use Hafijul233\Form\Providers\InlineFieldServiceProvider;
use Hafijul233\Form\Providers\LabelServiceProvider;
use Hafijul233\Form\Providers\NormalFieldServiceProvider;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\ServiceProvider;

/**
 * Class ComponentServiceProvider
 * @package Hafijul233\Form
 */
class ComponentServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->register(LabelServiceProvider::class);
        $this->app->register(HorizontalFieldServiceProvider::class);
        $this->app->register(GroupFieldServiceProvider::class);
        $this->app->register(InlineFieldServiceProvider::class);
        $this->app->register(NormalFieldServiceProvider::class);
    }
}
