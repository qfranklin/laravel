<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('paxg_prices', function (Blueprint $table) {
            $table->id();
            $table->timestamp('timestamp');
            $table->decimal('current_price', 20, 8);
            $table->decimal('high_24h', 20, 8)->nullable();
            $table->decimal('low_24h', 20, 8)->nullable();
            $table->decimal('market_cap', 30, 8)->nullable();
            $table->decimal('total_volume', 30, 8)->nullable();
            $table->decimal('circulating_supply', 30, 8)->nullable();
            $table->decimal('max_supply', 30, 8)->nullable();
            $table->decimal('sentiment_votes_up_percentage', 5, 2)->nullable();
            $table->decimal('sentiment_votes_down_percentage', 5, 2)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paxg_prices');
    }
};
