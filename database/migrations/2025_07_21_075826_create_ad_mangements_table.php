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
        Schema::create('ad_mangements', function (Blueprint $table) {
            $table->id();
            $table->string('home_special_header_top')->nullable();
            $table->string('home_special_header_bottom')->nullable();
            $table->string('home_category_bottom')->nullable();
            $table->string('home_double_category_bottom')->nullable();
            $table->string('home_sidebar_ad_one')->nullable();
            $table->string('home_sidebar_ad_two')->nullable();
            $table->string('home_sidebar_ad_three')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ad_mangements');
    }
};
