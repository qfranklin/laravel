<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AddHistoricalPriceData extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        $tables = [
            'bitcoin_prices' => 'historical_bitcoin_data.csv',
            'ethereum_prices' => 'historical_ethereum_data.csv',
            'monero_prices' => 'historical_monero_data.csv',
            'solana_prices' => 'historical_solana_data.csv',
        ];

        foreach ($tables as $table => $file) {
            // Wipe the table
            DB::table($table)->truncate();

            $filePath = public_path($file);
            $fileHandle = fopen($filePath, 'r');

            // Skip the header row
            fgetcsv($fileHandle, 0, ';');

            // Read the entire file into an array
            $dataRows = [];
            while (($data = fgetcsv($fileHandle, 0, ';')) !== FALSE) {
                $timestamps = [
                    'timeOpen' => Carbon::parse($data[0])->toDateTimeString(),
                    'timeHigh' => Carbon::parse($data[2])->toDateTimeString(),
                    'timeLow' => Carbon::parse($data[3])->toDateTimeString()
                ];

                foreach ($timestamps as $key => $timestamp) {
                    $currentPrice = match ($key) {
                        'timeOpen' => $data[5], // open
                        'timeHigh' => $data[6], // high
                        'timeLow' => $data[7],  // low
                    };

                    $dataRows[] = [
                        'timestamp' => $timestamp,
                        'current_price' => $currentPrice,
                        'high_24h' => $data[6],
                        'low_24h' => $data[7],
                        'market_cap' => $data[10],
                        'total_volume' => $data[9],
                        'created_at' => Carbon::now(),
                        'updated_at' => Carbon::now(),
                    ];
                }
            }

            // Sort the data by timestamp
            usort($dataRows, function ($a, $b) {
                return strtotime($a['timestamp']) - strtotime($b['timestamp']);
            });

            // Insert the sorted data into the database
            DB::table($table)->insert($dataRows);

            fclose($fileHandle);
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $tables = [
            'bitcoin_prices',
            'ethereum_prices',
            'monero_prices',
            'solana_prices',
        ];

        foreach ($tables as $table) {
            // Optionally, you can delete the imported data
            DB::table($table)->truncate();
        }
    }
}
