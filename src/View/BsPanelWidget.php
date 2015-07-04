<?php namespace Humweb\LaravelWidgets\View;

use Humweb\Widgets\Widget;

/**
 * TestWidget
 *
 * @package Humweb\LaravelWidgets\View
 */
class BsPanelWidget extends ViewWidget
{

    public function render($body = '', $title = null, $footer = null)
    {
        return $this->renderView('laravel-widgets::bootstrap.panel', compact('body', 'title'));
    }
}