<?php


namespace App\View\Components\Hrace009;

use Illuminate\View\Component;

class SelectWithPopover extends Component
{
    public $popover;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($popover)
    {
        $this->popover = $popover;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.hrace009.select-with-popover');
    }
}
