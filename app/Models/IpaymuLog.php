<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IpaymuLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_ipaymu';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['trx_id', 'user_id', 'amount', 'money', 'status', 'status_code', 'sid', 'reference_id'];

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'trx_id';

    /**
     * @var string
     */
    protected $keyType = 'string';
}
