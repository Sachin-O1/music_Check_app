<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models\Genre;


class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genres = ['Rock', 'Pop', 'Jazz', 'Blues', 'Traditional', 'EDM'];
        foreach ($genres as $genre)
        {
            Genre::create(['name' => $genre]);
        }
    }
}
