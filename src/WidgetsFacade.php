<?php

namespace Humweb\LaravelWidgets;

use Illuminate\Support\Facades\Facade as IlluminateFacade;

class WidgetsFacade extends IlluminateFacade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'widgets';
    }

}
