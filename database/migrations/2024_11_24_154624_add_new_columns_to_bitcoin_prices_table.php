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
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->decimal('open_price', 15, 2)->nullable();
            $table->decimal('close_price', 15, 2)->nullable();
            $table->decimal('high_price', 15, 2)->nullable();
            $table->decimal('low_price', 15, 2)->nullable();
            $table->bigInteger('volume')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->dropColumn(['open_price', 'close_price', 'high_price', 'low_price', 'volume']);
        });
    }
};
