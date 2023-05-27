<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Admin;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        Admin::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => bcrypt('password'),
        ]);
    }
}
