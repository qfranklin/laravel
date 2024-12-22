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
            $table->integer('lifepath_number')->after('timestamp')->nullable();
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->integer('lifepath_number')->after('timestamp')->nullable();
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->integer('lifepath_number')->after('timestamp')->nullable();
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->integer('lifepath_number')->after('timestamp')->nullable();
        });

        Schema::table('paxg_prices', function (Blueprint $table) {
            $table->integer('lifepath_number')->after('timestamp')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->dropColumn('lifepath_number');
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->dropColumn('lifepath_number');
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->dropColumn('lifepath_number');
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->dropColumn('lifepath_number');
        });

        Schema::table('paxg_prices', function (Blueprint $table) {
            $table->dropColumn('lifepath_number');
        });
    }
};
