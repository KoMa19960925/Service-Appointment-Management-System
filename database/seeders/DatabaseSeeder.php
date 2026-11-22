<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

        public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'address'=>'Jaffna',
            'phone'=>'+9478654875',
            'email' => 'admin@example.com',
            'password' => Hash::make('admin@example.com'),
            'role' => 'admin',
        ]);
    }
}
