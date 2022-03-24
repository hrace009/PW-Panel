<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $table = 'pwp_shops';
    protected $fillable = [
        'name',
        'description',
        'price',
        'discount',
        'item_id',
        'octet',
        'mask',
        'count',
        'max_count',
        'protection_type',
        'expire_date',
        'shareable'
    ];
}
