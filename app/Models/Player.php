<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    protected $table = 'pwp_player_rank';

    protected $fillable = ['id', 'name', 'cls', 'gender', 'spouse', 'level', 'level2', 'hp', 'mp', 'pariah_time', 'reputation', 'time_used', 'pk_count', 'dead_flag', 'force_id', 'title_id', 'faction_id', 'faction_name', 'faction_role', 'faction_contrib', 'faction_feat', 'equipment'];

    public function scopeSubType($query, $sub)
    {
        $column = [
            'level' => 'level',
            'rep' => 'reputation',
            'time' => 'time_used',
            'pvp' => 'pk_count'
        ];

        return $query
            ->whereNotIn('id', explode(',', config('pw-config.ignoreRoles')))
            ->orderBy($column[$sub] ?? 'level', 'desc');
    }

    public function getSpouse($id)
    {
        return $this->find($id);
    }
}
