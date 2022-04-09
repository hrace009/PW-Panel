<?php


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Helper;


class RandomStringGenerator
{
    public static function getRandomAlphaNum($length = 16): bool|string
    {
        $pool = '123456789abcdefghijklmnpqrstuvwxyz';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public static function getRandomNum($length = 16): bool|string
    {
        $pool = '123456789';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    public static function getVoucherCode($length = 6): bool|string
    {
        $pool = '123456789ABCDEFHJKMNPRSTWXYZ';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
