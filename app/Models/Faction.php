<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Faction extends Model
{
    protected $table = 'pwp_faction_rank';

    protected $fillable = ['id', 'name', 'level', 'master', 'master_name', 'members', 'time_used', 'pk_count', 'announce', 'sys_info', 'last_op_time', 'territories', 'contribution'];

    public function scopeSubType($query, $sub)
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
