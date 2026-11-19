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
        Schema::create('live_prices', function (Blueprint $table) {
            $table->id();
            $table->integer('price');
            $table->string('update_mode');
            $table->integer('referenceSite_id')->nullable();
            $table->string('difference_type');
            $table->integer('buy_difference');
            $table->integer('sell_difference');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('live_prices');
    }
};
