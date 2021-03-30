<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TableButtons extends Component
{
    /**
     * The singular data of table item.
     *
     * @var string
     */
    public $data;

    /**
     * The route name.
     *
     * @var string
     */
    public $route;

    /**
     * Create the component instance.
     *
     * @param  object  $data
     * @param  string  $route
     * @return void
     */
    public function __construct($data, $route)
    {
        $this->data = $data;
        $this->route = $route;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        $data = $this->data;
        $route = $this->route;
        return view('components.table-buttons', compact("data", "route"));
    }
}
