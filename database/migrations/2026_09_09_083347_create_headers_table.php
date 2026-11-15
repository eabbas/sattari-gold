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
        Schema::create('headers', function (Blueprint $table) {
            $table->id();
            $table->string('header_bg')->nullable();
            $table->string('header_img')->nullable();
            $table->string('title');
            $table->string('subTitle');
            $table->string('btnText');
            $table->string('btnLink');
            $table->string('btnIcon')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headers');
    }
};
