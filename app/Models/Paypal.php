<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paypal extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_paypals';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'transaction_id', 'amount'];

    protected $primaryKey = 'transaction_id';
}
