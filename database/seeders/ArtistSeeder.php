<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models\Artist;

class ArtistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $artists = ['Raghu Dixit', 'Nucleya', 'Ritviz', 'Nirali Kartik'];
        foreach ($artists as $artist) {
            Artist::create(['name' => $artist]);
        }
    }
}
