<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('assignedtechnicians', function (Blueprint $table) {

            $table->id();

            $table->foreignId('service_request_id')
                ->constrained('service_requests')
                ->onDelete('cascade');

            $table->foreignId('technician_id')
                ->constrained('users')
                ->onDelete('cascade');

            $table->string('status')->default('Scheduled');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('assignedtechnicians');
    }
};