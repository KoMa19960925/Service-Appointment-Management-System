<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('home_contents', function (Blueprint $table) {
            $table->id();

            $table->string('badge')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_subtitle')->nullable();
            $table->text('hero_description')->nullable();

            $table->string('feature_1_title')->nullable();
            $table->string('feature_2_title')->nullable();
            $table->string('feature_3_title')->nullable();
            $table->string('feature_4_title')->nullable();

            $table->string('process_title')->nullable();
            $table->string('process_1_title')->nullable();
            $table->text('process_1_description')->nullable();

            $table->string('process_2_title')->nullable();
            $table->text('process_2_description')->nullable();

            $table->string('process_3_title')->nullable();
            $table->text('process_3_description')->nullable();

            $table->string('process_4_title')->nullable();
            $table->text('process_4_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('home_contents');
    }
};