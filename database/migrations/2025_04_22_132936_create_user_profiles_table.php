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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('profile_image');
            $table->string('full_name');
            $table->string('about');
            $table->string('company');
            $table->string('job');
            $table->string('country');
            $table->bigInteger('phone')->unique();
            $table->string('email')->unique();
            $table->string('twitter_profile');
            $table->string('facebook_profile');
            $table->string('instagram_profile');
            $table->string('linkedin_profile');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
