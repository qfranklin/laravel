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
        // Example compatibility matrix
        $compatibilityMatrix = [
            1 => [1 => 'good', 2 => 'neutral', 3 => 'bad', /* ... */],
            2 => [1 => 'bad', 2 => 'good', 3 => 'neutral', /* ... */],
            // Add more mappings as needed
        ];

        return $compatibilityMatrix[$lifePathNumber][$personalDayNumber] ?? 'neutral';
    }
}
