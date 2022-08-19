<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */


/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Helper;


class RandomStringGenerator
{
    /**
     * @param int $length
     * @return string
     */
    public static function getRandomAlphaNum(int $length = 16): string
    {
        $pool = '123456789abcdefghijklmnpqrstuvwxyz';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function getRandomNum(int $length = 16): string
    {
        $pool = '123456789';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }

    /**
     * @param int $length
     * @return string
     */
    public static function getVoucherCode(int $length = 6): string
    {
        $pool = '123456789ABCDEFHJKMNPRSTWXYZ';
        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
}
