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
    Schema::table('orders', function (Blueprint $table) {
        if (!Schema::hasColumn('orders', 'delivered_at')) {
            $table->timestamp('delivered_at')->nullable();
        }
        if (!Schema::hasColumn('orders', 'canceled_at')) {
            $table->timestamp('canceled_at')->nullable();
        }
        if (!Schema::hasColumn('orders', 'deleted_at')) {
            $table->timestamp('deleted_at')->nullable();
        }
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
