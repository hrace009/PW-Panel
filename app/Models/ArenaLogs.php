<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ArenaLogs extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'pwp_arenalogs';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'ip_address', 'reward', 'status'];

    public function scopeCurrent($query, Request $request, $user_id, $logid, $valid)
    {
        return $query
            ->where('user_id', $user_id)
            ->where('id', $logid)
            ->where('status', $valid)
            ->where('created_at', '>=', Carbon::now()->subHours(config('arena.time')));
    }

    public function scopeRecent($query, Request $request, $user_id)
    {
        return $query
            ->where('user_id', $user_id)
            //->where('ip_address', $request->ip())
            ->where('created_at', '>=', Carbon::now()->subHours(config('arena.time')));
    }

    public function scopeOnCooldown($query, Request $request, $user_id)
    {
        return $query
            ->where('user_id', $user_id)
            //->where('ip_address', $request->ip())
            ->orderBy('created_at', 'desc')
            ->take(1);
    }

    public function color($type): string
    {
        $colors = [
            'cubi' => 'bg-primary hover:bg-primary-darker',
            'virtual' => 'bg-green-700 hover:bg-green-500',
            'bonusess' => 'bg-indigo-500 hover:bg-indigo-600',
        ];
        return $colors[$type];
    }
}
