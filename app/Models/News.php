<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    /**
     * @var string
     */
    public $table = 'pwp_news';

    /**
     * @var string[]
     */
    public $dates = ['created_at', 'updated_at'];

    /**
     * @var string[]
     */
    public $fillable = ['title', 'content', 'category'];

    /**
     * @param $type
     * @return string
     */
    public function color($type): string
    {
        $colors = [
            'update' => 'primary',
            'maintenance' => 'danger',
            'event' => 'success',
            'contest' => 'warning',
            'other' => 'default'
        ];
        return $colors[$type];
    }
}
