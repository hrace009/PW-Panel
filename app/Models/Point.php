<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'point';

    public function getOnlinePlayer(): int
    {
        return count($this->whereNotNull('zoneid')->get()->all());
    }
}
