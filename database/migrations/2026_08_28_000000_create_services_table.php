<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->text('description');
            $table->timestamps();
        });

        $services = [
            'Computer & IT Support Service' => 'Computer troubleshooting, repair and maintenance services.',
            'Electrical Service' => 'Electrical inspection, repair and maintenance services.',
            'Plumbing Service' => 'Plumbing installation, repair and maintenance services.',
            'Construction & Technical Support' => 'Professional construction and technical support and troubleshooting services.',
            'Cleaning & Maintenance Service' => 'Regular cleaning, maintenance and inspection services.',
            'Security Service' => 'Security services, inspection and maintenance services.',
        ];

        $now = now();

        foreach ($services as $name => $description) {
            DB::table('services')->insert([
                'name' => $name,
                'description' => $description,
                'created_at' => $now,
                'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
