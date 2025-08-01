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
        Schema::create('vote_poll_options', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vote_poll_id');
            $table->string('option_name');
            $table->integer('vote_count')->default(0);
            $table->timestamps();
            $table->foreign('vote_poll_id')->references('id')->on('vote_polls')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote_poll_options');
    }
};
