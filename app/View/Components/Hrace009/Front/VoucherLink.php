<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\View\Components\Hrace009\Front;

use Illuminate\View\Component;

class VoucherLink extends Component
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
        if (request()->routeIs('app.voucher.index')) {
            $status = 'true';
        } else {
            $status = 'false';
        }
        return view('components.hrace009.front.voucher-link', [
            'status' => $status,
        ]);
    }
}
