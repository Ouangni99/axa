<?php

namespace App\View\Components\Layout\Partials\PageLoader;

use Illuminate\View\Component;

class PageLoader extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.partials.page-loader.page-loader');
    }
}
