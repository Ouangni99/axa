<?php

namespace App\View\Components\Resources;

use Illuminate\View\Component;

class ResourcesCss extends Component
{
    /**
     * Ressources.
     *
     * @var array
     */
    public $css;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($css)
    {
        $this->css = $css;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.resources.resources-css');
    }
}
