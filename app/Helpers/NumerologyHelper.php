<?php

namespace App\Helpers;

class NumerologyHelper
{
    public static function reduceLifePathDate($date)
    {
        $date = new \DateTime($date);
        $sum = array_sum(str_split($date->format('Ymd')));

        while ($sum > 9 && !in_array($sum, [11, 22, 33])) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }

    public static function calculatePersonalDayNumber($lifePathNumber, $universalDayNumber)
    {
        $sum = $lifePathNumber + $universalDayNumber;

        while ($sum > 9 && !in_array($sum, [11, 22, 33])) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }

    public static function getDailyPrediction($lifePathNumber, $personalDayNumber)
    {
        $compatibilityMatrix = [
            1  => [1 => 'good', 2 => 'neutral', 3 => 'good', 4 => 'neutral', 5 => 'good', 6 => 'neutral', 7 => 'bad', 8 => 'neutral', 9 => 'bad', 11 => 'good', 22 => 'neutral', 33 => 'neutral'],
            2  => [1 => 'bad', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'bad', 9 => 'neutral', 11 => 'good', 22 => 'good', 33 => 'good'],
            3  => [1 => 'neutral', 2 => 'good', 3 => 'good', 4 => 'bad', 5 => 'good', 6 => 'neutral', 7 => 'bad', 8 => 'neutral', 9 => 'good', 11 => 'neutral', 22 => 'neutral', 33 => 'good'],
            4  => [1 => 'neutral', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'bad', 11 => 'neutral', 22 => 'good', 33 => 'neutral'],
            5  => [1 => 'good', 2 => 'neutral', 3 => 'good', 4 => 'neutral', 5 => 'good', 6 => 'neutral', 7 => 'bad', 8 => 'neutral', 9 => 'good', 11 => 'good', 22 => 'neutral', 33 => 'good'],
            6  => [1 => 'neutral', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'neutral', 11 => 'good', 22 => 'good', 33 => 'good'],
            7  => [1 => 'bad', 2 => 'neutral', 3 => 'bad', 4 => 'neutral', 5 => 'bad', 6 => 'neutral', 7 => 'good', 8 => 'neutral', 9 => 'good', 11 => 'neutral', 22 => 'neutral', 33 => 'neutral'],
            8  => [1 => 'neutral', 2 => 'bad', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'neutral', 11 => 'good', 22 => 'neutral', 33 => 'good'],
            9  => [1 => 'bad', 2 => 'neutral', 3 => 'good', 4 => 'bad', 5 => 'good', 6 => 'neutral', 7 => 'good', 8 => 'neutral', 9 => 'good', 11 => 'neutral', 22 => 'good', 33 => 'good'],
            11 => [1 => 'good', 2 => 'good', 3 => 'neutral', 4 => 'neutral', 5 => 'good', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'neutral', 11 => 'good', 22 => 'good', 33 => 'good'],
            22 => [1 => 'neutral', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'neutral', 9 => 'good', 11 => 'good', 22 => 'good', 33 => 'good'],
            33 => [1 => 'neutral', 2 => 'good', 3 => 'good', 4 => 'neutral', 5 => 'good', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'good', 11 => 'good', 22 => 'good', 33 => 'good'],
        ];

        return $compatibilityMatrix[$lifePathNumber][$personalDayNumber] ?? 'neutral';
    }
}
