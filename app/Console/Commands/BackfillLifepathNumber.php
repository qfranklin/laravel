<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Helpers\NumerologyHelper;
use App\Models\BitcoinPrice;
use App\Models\EthereumPrice;
use App\Models\MoneroPrice;
use App\Models\SolanaPrice;
use App\Models\PaxgPrice;

class BackfillLifepathNumber extends Command
{
    protected $signature = 'backfill:lifepath-number';
    protected $description = 'Backfill lifepath number for existing crypto records';

    protected $models = [
        BitcoinPrice::class,
        EthereumPrice::class,
        MoneroPrice::class,
        SolanaPrice::class,
        PaxgPrice::class,
    ];

    public function handle()
    {
        foreach ($this->models as $model) {
            $model::chunk(100, function ($records) use ($model) {
                foreach ($records as $record) {
                    $record->lifepath_number = NumerologyHelper::reduceLifePathDate($record->timestamp);
                    $record->save();
                }
            });
        }

        $this->info('Lifepath numbers have been backfilled.');
    }
}
