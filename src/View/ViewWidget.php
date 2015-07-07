<?php namespace Humweb\LaravelWidgets\View;

use Humweb\Widgets\Widget;

/**
 * WidgetView
 *
 * @package Humweb\LaravelWidgets\View
 */
abstract class ViewWidget extends Widget
{

    protected $data = [];


    public function render()
    {
        return '';
    }

    
    /**
     * Render widget view
     *
     * @param string $view
     * @param array  $data
     *
     * @return string
     */
    public function renderView($view, $data = [])
    {

        if ($data instanceof Arrayable) {
            $data = $data->toArray();
        }

        $data = array_merge($this->data, is_array($data) ? $data : []);

        return $this->createView($view, $data)->render();
    }


    /**
     * Share data with the layout and view used by the widget.
     */
    protected function viewShare($key, $data)
    {
        $this->data[$key] = $data;
    }


    /**
     * Set widget title
     *
     * @param string $title
     */
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