<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\RawMaterial;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('Admin1234')
        ]);

        RawMaterial::create([
            'name' => 'batok kelapa',
            'quantity' => 100,
        ]);

        RawMaterial::create([
            'name' => 'tepung',
            'quantity' => 50,
        ]);

        RawMaterial::create([
            'name' => 'air',
            'quantity' => 200,
        ]);
    }
}
