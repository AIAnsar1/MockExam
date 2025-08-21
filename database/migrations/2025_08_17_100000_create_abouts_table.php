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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->json('about_project');
            $table->json('teams');
            $table->json('social_media');
            $table->json('mission')->nullable();
            $table->json('contacts')->nullable();
            $table->json('partners')->nullable();
            $table->json('faq')->nullable();
            $table->json('policies')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
