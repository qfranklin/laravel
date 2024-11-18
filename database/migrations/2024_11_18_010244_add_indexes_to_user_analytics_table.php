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
        Schema::table('user_analytics', function (Blueprint $table) {
            $table->index('session_id');
            $table->index('user_id');
            $table->index('event_type');
            $table->index('product_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('user_analytics', function (Blueprint $table) {
            $table->dropIndex(['session_id']);
            $table->dropIndex(['user_id']);
            $table->dropIndex(['event_type']);
            $table->dropIndex(['product_id']);
        });
    }
};
