<?php

namespace App\View\Components\Backend;

use Illuminate\View\Component;

class RecentItemsList extends Component
{
    public $title;
    public $icon;
    public $items;

    /**
     * Create a new component instance.
     *
     * @param  string  $title
     * @param  string  $icon
     * @param  array  $items
     * @return void
     */
    public function __construct($title, $icon, $items)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->items = $items;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.backend.recent-items-list');
    }
}