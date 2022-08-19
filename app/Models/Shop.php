<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    public $table = 'pwp_shops';
    protected $fillable = [
        'name',
        'image',
        'icon',
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

    /**
     * @param $type
     * @return string[]
     */
    public function maskType($type): array
    {
        $category = null;
        if ($type === 0 || $type === 1 || $type === 262144 || $type === 524288 || $type === 4096 || $type === 2048) {
            //General
            $category = [
                'category' => __('shop.general'),
                'item' => __('shop.masks.') . $type,
                'color' => 'bg-blue-700 hover:bg-blue-500',
            ];
        }

        if ($type === 2 || $type === 16 || $type === 64 || $type === 128 || $type === 256 || $type === 8) {
            //Equipment / Armor
            $category = [
                'category' => __('shop.equipment'),
                'item' => __('shop.masks.armor.') . $type,
                'color' => 'bg-green-700 hover:bg-green-500',
            ];
        }

        if ($type === 8192 || $type === 16384 || $type === 32768 || $type === 65536 || $type === 33554432 || $type === 536870912) {
            //Fashion
            $category = [
                'category' => __('shop.fashion'),
                'item' => __('shop.masks.fashion.') . $type,
                'color' => 'bg-yellow-700 hover:bg-yellow-500',
            ];
        }

        if ($type === 1536 || $type === 4 || $type === 32) {
            //Accessories
            $category = [
                'category' => __('shop.accessories'),
                'item' => __('shop.masks.accessories.') . $type,
                'color' => 'bg-primary hover:bg-primary-darker',
            ];
        }

        if ($type === 1048576 || $type === 2097152) {
            //Charms
            $category = [
                'category' => __('shop.charms'),
                'item' => __('shop.masks.charms.') . $type,
                'color' => 'bg-red-700 hover:bg-red-500',
            ];
        }

        return $category;
    }
}
