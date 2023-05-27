<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Models\Venue;
use App\Models\Models\Genre;

class VenueSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $venues = [
            ['name' => 'Asiatic library steps', 'address' => 'Address 1', 'contact_number' => '1234567890'],
            ['name' => 'JIO Garden', 'address' => 'Address 2', 'contact_number' => '9876543210'],
            ['name' => 'Grease Monkey', 'address' => 'Address 3', 'contact_number' => '5678901234'],
        ];

        foreach ($venues as $venue) {
            Venue::create($venue);
        }
    }
}
