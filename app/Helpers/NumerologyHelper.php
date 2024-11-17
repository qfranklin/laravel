<?php

namespace App\Helpers;

class NumerologyHelper
{
    public static function calculateLifePathNumber($birthday)
    {
        $date = new \DateTime($birthday);
        $sum = array_sum(str_split($date->format('Ymd')));

        while ($sum > 9 && $sum !== 11 && $sum !== 22) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }

    public static function calculateUniversalDayNumber($currentDate)
    {
        $date = new \DateTime($currentDate);
        $sum = array_sum(str_split($date->format('Ymd')));

        while ($sum > 9 && $sum !== 11 && $sum !== 22) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }

    public static function calculatePersonalDayNumber($lifePathNumber, $universalDayNumber)
    {
        $sum = $lifePathNumber + $universalDayNumber;

        while ($sum > 9 && $sum !== 11 && $sum !== 22) {
            $sum = array_sum(str_split($sum));
        }

        return $sum;
    }

    public static function getDailyPrediction($lifePathNumber, $personalDayNumber)
    {
        $compatibilityMatrix = [
            1 => [1 => 'good', 2 => 'neutral', 3 => 'good', 4 => 'neutral', 5 => 'good', 6 => 'neutral', 7 => 'bad', 8 => 'neutral', 9 => 'bad'],
            2 => [1 => 'bad', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'bad', 9 => 'neutral'],
            3 => [1 => 'neutral', 2 => 'good', 3 => 'good', 4 => 'bad', 5 => 'good', 6 => 'neutral', 7 => 'bad', 8 => 'neutral', 9 => 'good'],
            4 => [1 => 'neutral', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'bad'],
            5 => [1 => 'good', 2 => 'neutral', 3 => 'good', 4 => 'neutral', 5 => 'good', 6 => 'neutral', 7 => 'bad', 8 => 'neutral', 9 => 'good'],
            6 => [1 => 'neutral', 2 => 'good', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'neutral'],
            7 => [1 => 'bad', 2 => 'neutral', 3 => 'bad', 4 => 'neutral', 5 => 'bad', 6 => 'neutral', 7 => 'good', 8 => 'neutral', 9 => 'good'],
            8 => [1 => 'neutral', 2 => 'bad', 3 => 'neutral', 4 => 'good', 5 => 'neutral', 6 => 'good', 7 => 'neutral', 8 => 'good', 9 => 'neutral'],
            9 => [1 => 'bad', 2 => 'neutral', 3 => 'good', 4 => 'bad', 5 => 'good', 6 => 'neutral', 7 => 'good', 8 => 'neutral', 9 => 'good'],
        ];

        return $compatibilityMatrix[$lifePathNumber][$personalDayNumber] ?? 'neutral';
    }
}
