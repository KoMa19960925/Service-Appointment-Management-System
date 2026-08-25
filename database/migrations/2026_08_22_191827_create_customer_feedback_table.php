<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
 
    public function up(): void
    {
        Schema::create('customer_feedback', function (Blueprint $table) {
        
               $table->id();
               $table->foreignId('customer_id')->constrained('users')->cascadeOnDelete();
               $table->foreignId('technician_id')->constrained('users')->cascadeOnDelete();
               $table->foreignId('service_request_id')->constrained('service_requests')->cascadeOnDelete();
               $table->unsignedTinyInteger('rating');
               $table->text('comment');
               $table->timestamps();
        });
    }

  

    public function down(): void
    {
        Schema::dropIfExists('customer_feedback');
    }
};
