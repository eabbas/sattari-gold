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
        Schema::create('deal_temporaries', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('deal_id');
            $table->integer('goldPrice');
            $table->string('action');
            $table->string('calcBy');
            $table->integer('userInput');
            $table->integer('resultOutput');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deal_temporaries');
    }
};
