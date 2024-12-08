<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Carbon\Carbon;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Add the new timestamp column
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->timestamp('timestamp')->after('id')->nullable();
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->timestamp('timestamp')->after('id')->nullable();
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->timestamp('timestamp')->after('id')->nullable();
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->timestamp('timestamp')->nullable();
        });

        // Convert date to timestamp and update the new column
        DB::table('bitcoin_prices')->get()->each(function ($record) {
            $timestamp = Carbon::parse($record->date, 'America/New_York')->setTime(3, 0)->toDateTimeString();
            DB::table('bitcoin_prices')->where('id', $record->id)->update(['timestamp' => $timestamp]);
        });

        DB::table('ethereum_prices')->get()->each(function ($record) {
            $timestamp = Carbon::parse($record->date, 'America/New_York')->setTime(3, 0)->toDateTimeString();
            DB::table('ethereum_prices')->where('id', $record->id)->update(['timestamp' => $timestamp]);
        });

        DB::table('monero_prices')->get()->each(function ($record) {
            $timestamp = Carbon::parse($record->date, 'America/New_York')->setTime(3, 0)->toDateTimeString();
            DB::table('monero_prices')->where('id', $record->id)->update(['timestamp' => $timestamp]);
        });

        DB::table('solana_prices')->get()->each(function ($record) {
            $timestamp = Carbon::parse($record->date, 'America/New_York')->setTime(3, 0)->toDateTimeString();
            DB::table('solana_prices')->where('id', $record->id)->update(['timestamp' => $timestamp]);
        });

        // Drop the existing date column
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->dropColumn('date');
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->dropColumn('date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Add the date column back
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->date('date')->nullable();
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->date('date')->nullable();
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->date('date')->nullable();
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->date('date')->nullable();
        });

        // Drop the timestamp column
        Schema::table('bitcoin_prices', function (Blueprint $table) {
            $table->dropColumn('timestamp');
        });

        Schema::table('ethereum_prices', function (Blueprint $table) {
            $table->dropColumn('timestamp');
        });

        Schema::table('monero_prices', function (Blueprint $table) {
            $table->dropColumn('timestamp');
        });

        Schema::table('solana_prices', function (Blueprint $table) {
            $table->dropColumn('timestamp');
        });
    }
};
