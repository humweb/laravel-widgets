<?php

namespace Humweb\LaravelWidgets;

use Humweb\Widgets\WidgetFactory;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class WidgetsServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/resources/views', 'laravel-widgets');
        AliasLoader::getInstance()->alias('Widgets', 'Humweb\LaravelWidgets\WidgetsFacade');
    }


    /**
     * Register
     */
    public function register()
    {

        $this->app->singleton('widgets', function () {
            return new WidgetFactory();
        });

        $this->app['widgets']->register('testWidget', 'Humweb\LaravelWidgets\View\TestWidget');


    }
}
