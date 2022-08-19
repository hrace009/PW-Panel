<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Admin;

use Illuminate\View\Component;

class DashboardLink extends Component
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
        if (request()->routeIs('admin.dashboard')) {
            $status = 'true';

        } else {
            $status = 'false';
        }
        return view('components.hrace009.admin.dashboard-link', [
            'status' => $status,
        ]);
    }
}
