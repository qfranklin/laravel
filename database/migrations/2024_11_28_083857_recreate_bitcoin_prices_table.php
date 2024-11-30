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
        Schema::dropIfExists('bitcoin_prices');

        Schema::create('bitcoin_prices', function (Blueprint $table) {
            $table->id();
            $table->date('date')->unique();
            $table->decimal('high_24h', 20, 2)->nullable();
            $table->decimal('low_24h', 20, 2)->nullable();
            $table->decimal('market_cap', 20, 2)->nullable();
            $table->bigInteger('total_volume')->nullable();
            $table->bigInteger('circulating_supply')->nullable();
            $table->bigInteger('max_supply')->nullable();
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
        Schema::dropIfExists('bitcoin_prices');
    }
};
