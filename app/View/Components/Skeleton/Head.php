<?php

namespace App\View\Components\Skeleton;

use Illuminate\View\Component;

class Head extends Component
{
    /**
     * breadcrumb..
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
        return view('components.skeleton.head');
    }
}
