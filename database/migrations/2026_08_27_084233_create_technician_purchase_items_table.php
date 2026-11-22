<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('technician_purchase_items', function (Blueprint $table) {
            $table->id();

            $table->foreignId('technician_payment_id')
                ->constrained('technician_payments')
                ->onDelete('cascade');

            $table->string('item_name');

            $table->integer('quantity')->default(1);

            $table->text('item_description')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('technician_purchase_items');
    }
};