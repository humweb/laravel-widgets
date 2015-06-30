<?php

namespace Humweb\LaravelWidgets;

use Humweb\Widgets\WidgetFactory;
use Illuminate\Foundation\AliasLoader;
use Illuminate\Support\ServiceProvider;

class WidgetServiceProvider extends ServiceProvider
{

    /**
     * Register
     */
    public function register()
    {
        $this->app->singleton('widgets', function () {
            return new WidgetFactory();
        });

        AliasLoader::getInstance()->alias('Widgets', 'Humweb\LaravelWidgets\WidgetsFacade');
    }
}
