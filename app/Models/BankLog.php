<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankLog extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_bank_log';

    /**
     * @var string[]
     */
    protected $fillable = [
        'fullname',
        'banknum',
        'gameID',
        'loginid',
        'email',
        'phone',
        'type',
        'bankname',
        'amount',
        'status',
        'reason'
    ];

    public function color($status): string
    {
        if ($status === 'accept') {
            $color = 'bg-green-200 text-green-600';
        } elseif ($status === 'pending') {
            $color = 'bg-yellow-200 text-yellow-600';
        } elseif ($status === 'reject') {
            $color = 'bg-red-200 text-red-600';
        } else {
            $color = '';
        }
        return $color;
    }
}
