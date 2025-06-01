<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Accommodation;

class AccommodationSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::where('role', 'provider')->first();
        if (!$provider) {
            $provider = User::factory()->create(['role' => 'provider', 'name' => 'Provider User', 'email' => 'provider@example.com', 'password' => bcrypt('password')]);
        }

        $accommodations = [
            ['name' => 'Hotel Sabang', 'description' => 'A cozy hotel by the beach', 'location' => 'Sabang Beach', 'price_per_night' => 500000, 'image' => 'storage/img/carou1.jpg'],
            ['name' => 'Villa Pantai', 'description' => 'Luxury villa with sea view', 'location' => 'Pantai Iboih', 'price_per_night' => 750000, 'image' => 'storage/img/carou2.jpg'],
        ];

        foreach ($accommodations as $accommodation) {
            Accommodation::create(array_merge($accommodation, ['provider_id' => $provider->id]));
        }
    }
}