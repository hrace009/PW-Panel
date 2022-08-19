<?php


namespace App\View\Components\Hrace009\Front;

use Illuminate\View\Component;

class ServicesLink extends Component
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
        if (request()->routeIs('app.services.index')) {
            $status = 'true';
        } else {
            $status = 'false';
        }
        return view('components.hrace009.front.services-link', [
            'status' => $status
        ]);
    }
}
