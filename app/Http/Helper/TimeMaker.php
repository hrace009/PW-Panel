<?php
/*
 * @author Harris Marfel <hrace009@gmail.com>
 * @link https://www.hrace009.com
 * @copyright Copyright (c) 2022.
 */

namespace App\Http\Helper;

class TimeMaker
{
    public function makeTime($time): string
    {
        $days = floor($time / 86400);
        $TextDays = $days > 0 ? ($days > 1) ? $days . " " . trans('ranking.time.days') : $days . " " . trans('ranking.time.day') : '';

        $hours = ceil(ceil($time - ($days * 86400)) / 3600);
        $TextHours = $hours > 1 ? ($hours > 1) ? $hours . " " . trans('ranking.time.hours') : $hours . " " . trans('ranking.time.hour') : ' > 1 ' . trans('ranking.time.hour');

        return $TextDays . ' ' . $TextHours;
    }
}
