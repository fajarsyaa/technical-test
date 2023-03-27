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
        Schema::create('vehicle_orders', function (Blueprint $table) {
            $table->id();
            $table->date('date_order');
            $table->string('plat_number');
            $table->string('vehicle_owner');
            $table->string('information');
            $table->string('travel_start');
            $table->string('travel_destinations');
            $table->string('driver');
            $table->string('description');
            $table->boolean('to_mdr');
            $table->boolean('to_spv');
            $table->boolean('to_hrd');
            $table->boolean('approved_mdr');
            $table->boolean('approved_spv');
            $table->boolean('approved_hrd');
            $table->boolean('is_approve')->default(false);
            $table->boolean('is_reject')->default(false);
            $table->boolean('finish')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_orders');
    }
};
