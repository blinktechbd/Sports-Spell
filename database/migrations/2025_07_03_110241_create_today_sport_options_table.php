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
        Schema::create('today_sport_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('today_sport_id');
            $table->string('option_name');
            $table->integer('vote_count')->default(0);
            $table->timestamps();
            $table->foreign('today_sport_id')->references('id')->on('today_sports')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('today_sport_options');
    }
};
