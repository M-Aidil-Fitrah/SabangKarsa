<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AccommodationSeeder::class,
            DriverSeeder::class,
            TourGuideSeeder::class,
            DestinationSeeder::class,
            StrollSeeder::class,
            AgendaSeeder::class,
        ]);
    }
}