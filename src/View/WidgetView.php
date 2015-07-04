<?php namespace Humweb\LaravelWidgets\View;

use Humweb\Widgets\Widget;

/**
 * WidgetView
 *
 * @package Humweb\LaravelWidgets\View
 */
abstract class WidgetView extends Widget
{

    protected $layout = 'laravel-widgets::layouts.default';


    /**
     * Controller constructor.
     */
    public function __construct()
    {
    }


    /**
     * Show the user profile.
     */
    public function renderView($view, $data = [])
    {

        $this->setupLayout();

        if ( ! is_null($this->layout)) {
            return $this->renderLayoutAndView($view, $data);
        }

        return $this->createView($view, $data)->render();
    }


    protected function renderLayoutAndView($view, $data = [])
    {
        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        $data = is_array($data) ? $data : [];

        return $this->layout->nest('child', $view, $data)->render();
    }


    /**
     * Setup the layout used by the widget.
     */
    protected function setupLayout()
    {
        if ( ! is_null($this->layout)) {
            $this->layout = $this->createView($this->layout);
        }
    }


    /**
     * Setup the layout used by the widget.
     */
    protected function viewShare($key, $data)
    {
        view()->share($key, $data);
    }


    public function setTitle($title)
    {
        $this->viewShare('title', $title);
    }


    /**
     * Get the evaluated view contents for the given view.
     *
     * @param  string $view
     * @param  array  $data
     * @param  array  $mergeData
     *
     * @return \Illuminate\View\View
     */
    protected function createView($view = null, $data = [], $mergeData = [])
    {
        $factory = app('Illuminate\Contracts\View\Factory');

        if (func_num_args() === 0) {
            return $factory;
        }

        return $factory->make($view, $data, $mergeData);
    }
}