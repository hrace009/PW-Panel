<?php

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
}
