<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        \App\Models\User::factory()->create([
            'name' => 'ahdan',
            'email' => 'ahdan.abde@gmail.com',
            'alamat' => 'Sumberagung,Jetis,Bantul',
            'telepon' => '08983660660',
            'role' => 'admin',
            'password' => Hash::make('tehmanis'),
        ]);

        \App\Models\User::factory(20)->create();
        \App\Models\Pelanggan::factory(20)->create();
        \App\Models\Category::factory()->create([
            'nama_categori' => 'Wireless Earphone',
        ]);
        \App\Models\Category::factory()->create([
            'nama_categori' => 'Earphone',
        ]);
        \App\Models\Category::factory()->create([
            'nama_categori' => 'PowerBank',
        ]);
    }
}
