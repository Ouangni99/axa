<?php

namespace App\View\Components\Resources;

use Illuminate\View\Component;

class ResourcesJs extends Component
{
    /**
     * Ressources.
     *
     * @var array
     */
    public $js;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($js)
    {
        $this->js = $js;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.resources.resources-js');
    }
}
