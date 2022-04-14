<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use LaravelIdea\Helper\App\Models\_IH_Player_C;

class Player extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_players';

    /**
     * @var string[]
     */
    protected $fillable = ['id', 'name', 'cls', 'gender', 'spouse', 'level', 'level2', 'hp', 'mp', 'pariah_time', 'reputation', 'time_used', 'pk_count', 'dead_flag', 'force_id', 'title_id', 'faction_id', 'faction_name', 'faction_role', 'faction_contrib', 'faction_feat', 'equipment'];

    /**
     * @param $query
     * @param $sub
     * @return mixed
     */
    public function scopeSubType($query, $sub): mixed
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

    /**
     * @param $id
     * @return Player|Player[]|_IH_Player_C|null
     */
    public function getSpouse($id): Player|array|_IH_Player_C|null
    {
        return $this->find($id);
    }
}
