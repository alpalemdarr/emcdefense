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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('title_tr');
            $table->string('title_en');
            $table->string('badge_tr')->nullable();
            $table->string('badge_en')->nullable();
            $table->text('lead_tr')->nullable();
            $table->text('lead_en')->nullable();
            $table->longText('content_tr')->nullable();
            $table->longText('content_en')->nullable();
            $table->string('meta_title_tr')->nullable();
            $table->string('meta_title_en')->nullable();
            $table->text('meta_description_tr')->nullable();
            $table->text('meta_description_en')->nullable();
            $table->boolean('is_active')->default(true);
            $table->boolean('is_system')->default(false);
            $table->boolean('show_in_navbar')->default(false);
            $table->boolean('show_in_footer')->default(false);
            $table->integer('sort_order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
