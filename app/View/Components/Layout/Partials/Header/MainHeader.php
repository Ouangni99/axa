<?php

namespace App\View\Components\Layout\Partials\Header;

use Illuminate\View\Component;

class MainHeader extends Component
{
    /**
     * set $breadcrumb trail.
     *
     * @var array
     */
    public $breadcrumb;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($breadcrumb)
    {
        $this->breadcrumb = $breadcrumb;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.layout.partials.header.main-header');
    }
}
