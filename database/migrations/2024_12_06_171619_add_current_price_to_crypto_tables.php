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
            $table->decimal('current_price', 20, 2)->after('date')->nullable();
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->decimal('current_price', 20, 2)->after('date')->nullable();
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->decimal('current_price', 20, 2)->after('date')->nullable();
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->decimal('current_price', 20, 2)->after('date')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->dropColumn('current_price');
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->dropColumn('current_price');
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->dropColumn('current_price');
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->dropColumn('current_price');
        });
    }
};
