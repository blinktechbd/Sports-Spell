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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('site_title')->nullable();
            $table->string('site_desc')->nullable();
            $table->string('logo')->nullable();
            $table->string('favicon')->nullable();
            $table->string('logo')->nullable();
            $table->string('meta_title')->nullable();
            $table->string('meta_desc')->nullable();
            $table->string('meta_img')->nullable();
            $table->string('social_fb_icon')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_tw_icon')->nullable();
            $table->string('social_tw')->nullable();
            $table->string('social_ln_icon')->nullable();
            $table->string('social_ln')->nullable();
            $table->string('social_yt_icon')->nullable();
            $table->string('social_yt')->nullable();
            $table->longText('about')->nullable();
            $table->longText('contact')->nullable();
            $table->longText('privacy_policy')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
