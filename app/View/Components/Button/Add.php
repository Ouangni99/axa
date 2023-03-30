<?php

namespace App\View\Components\Button;

use Illuminate\View\Component;

class Add extends Component
{
    /**
     * btn attribute id.
     *
     * @var string
     */
    public $modalID;
    public $attribueID;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($modalID , $attribueID)
    {
        $this->modalID = $modalID;
        $this->attribueID = $attribueID;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.button.add');
    }
}
