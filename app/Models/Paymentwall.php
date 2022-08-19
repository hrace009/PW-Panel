<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paymentwall extends Model
{
    /**
     * @var string
     */
    public $table = 'pwp_paymentwall_log';

    /**
     * @var string[]
     */
    public $dates = ['created_at', 'updated_at'];

    /**
     * @var string[]
     */
    public $fillable = ['userID', 'amount', 'refid', 'type'];

    public function color($type): string
    {
        if ($type === 0) {
            $color = '<span class="bg-green-200 text-green-600 py-1 px-3 rounded-full text-xs" >' . __('donate.history.table.Paymentwall.color.success') . '</span>';
        } elseif ($type === 1) {
            $color = '<span class="bg-yellow-200 text-yellow-600 py-1 px-3 rounded-full text-xs" >' . __('donate.history.table.Paymentwall.color.cs') . '</span>';
        } elseif ($type === 2) {
            $color = '<span class="bg-red-200 text-red-600 py-1 px-3 rounded-full text-xs" >' . __('donate.history.table.Paymentwall.color.failed') . '</span>';
        } else {
            $color = '';
        }
        return $color;
    }
}
