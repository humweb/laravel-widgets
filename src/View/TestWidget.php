<?php namespace Humweb\LaravelWidgets\View;

use Humweb\Widgets\Widget;

/**
 * WidgetView
 *
 * @package Humweb\LaravelWidgets\View
 */
class TestWidget extends WidgetView
{

    public function render($body = '', $title= '')
    {
        return $this->renderView('laravel-widgets::test_widget', compact('body', 'title'));
    }
}