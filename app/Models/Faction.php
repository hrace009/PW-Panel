<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_factions';

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'name', 'level', 'master', 'master_name', 'members', 'time_used', 'pk_count', 'announce', 'sys_info', 'last_op_time', 'territories', 'contribution'];

    /**
     * @param $query
     * @param $sub
     * @return mixed
     */
    public function scopeSubType($query, $sub): mixed
    {
        $column = [
            'level' => 'level',
            'members' => 'members',
            'territories' => 'territories',
            'pvp' => 'pk_count',
        ];

        return $query
            ->whereNotIn('id', explode(',', config('pw-config.ignoreFaction')))
            ->orderBy($column[$sub] ?? 'level', 'desc');
    }
}
