<?php



/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://youtube.com/c/hrace009
 * @copyright Copyright (c) 2022.
 */

namespace App\Models;

use Carbon\Carbon;
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
    public $fillable = ['title', 'slug', 'og_image', 'description', 'keywords', 'content', 'category', 'author'];

    /**
     * @param $type
     * @return string
     */
    public function color($type): string
    {
        $colors = [
            'update' => 'bg-primary hover:bg-primary-darker',
            'maintenance' => 'bg-red-700 hover:bg-red-500',
            'event' => 'bg-green-700 hover:bg-green-500',
            'contest' => 'bg-yellow-700 hover:bg-yellow-500',
            'download' => 'bg-primary hover:bg-primary-darker',
            'guide' => 'bg-primary hover:bg-primary-darker',
            'other' => 'bg-blue-700 hover:bg-blue-500'
        ];
        return $colors[$type];
    }

    public function categoryColor($type ): string
    {
        $colors = [
            'update' => 'success',
            'maintenance' => 'primary',
            'event' => 'info',
            'contest' => 'warning',
            'download' => 'info',
            'guide' => 'info',
            'other' => 'danger'
        ];
        return $colors[$type];
    }

    public function date(string $date): string
    {
        return (Carbon::parse($date)->diff(Carbon::now())->days < 30) ? Carbon::parse($date)->diffForHumans() : Carbon::parse($date)->translatedFormat('D, j F, Y');
    }

    public function tags(string $keywords): array
    {
        $results = [];
        $tags = explode(',', $keywords);
        foreach ($tags as $tag) {
            $results[] = $tag;
        }
        return $results;
    }
}
