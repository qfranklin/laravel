<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use App\Helpers\NumerologyHelper;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $table = 'bitcoin_prices';
        $file = 'historical_bitcoin_data2.csv';

        $filePath = public_path($file);
        $fileHandle = fopen($filePath, 'r');

        // Skip the header row
        fgetcsv($fileHandle, 0, ',');

        // Read the entire file into an array
        $dataRows = [];
        while (($data = fgetcsv($fileHandle, 0, ',')) !== FALSE) {
            $timestamp = Carbon::parse($data[0])->toDateString() . ' 00:00:00';
            $currentPrice = floatval(str_replace(',', '', $data[2]));
            $high24h = floatval(str_replace(',', '', $data[3]));
            $low24h = floatval(str_replace(',', '', $data[4]));
            // Convert Vol. to a number
            $totalVolume = $data[5];
            if (empty($totalVolume)) {
                $totalVolume = null;
            } elseif (strpos($totalVolume, 'K') !== false) {
                $totalVolume = floatval($totalVolume) * 1000;
            } elseif (strpos($totalVolume, 'M') !== false) {
                $totalVolume = floatval($totalVolume) * 1000000;
            } elseif (strpos($totalVolume, 'B') !== false) {
                $totalVolume = floatval($totalVolume) * 1000000000;
            }

            $lifepathNumber = NumerologyHelper::reduceLifePathDate($timestamp);

            $dataRows[] = [
                'timestamp' => $timestamp,
                'lifepath_number' => $lifepathNumber,
                'current_price' => $currentPrice,
                'high_24h' => $high24h,
                'low_24h' => $low24h,
                'total_volume' => $totalVolume,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }
        
        // Insert or update the data
        foreach ($dataRows as $row) {
            DB::table($table)->updateOrInsert(
                ['timestamp' => $row['timestamp']],
                $row
            );
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Optionally, you can add code to reverse the migration if needed
    }
};
