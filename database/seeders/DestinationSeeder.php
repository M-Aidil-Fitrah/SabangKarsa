<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Destination;

class DestinationSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::where('role', 'provider')->first();
        if (!$provider) {
            $provider = User::factory()->create(['role' => 'provider', 'name' => 'Provider User', 'email' => 'provider@example.com', 'password' => bcrypt('password')]);
        }

        $destinations = [
            ['name' => 'Pantai Iboih', 'description' => 'Beautiful beach with clear water', 'location' => 'Sabang', 'image' => 'storage/img/carou9.jpg'],
            ['name' => 'Rubiah Island', 'description' => 'Great spot for snorkeling', 'location' => 'Sabang', 'image' => 'storage/img/carou10.jpg'],
        ];

        foreach ($destinations as $destination) {
            Destination::create(array_merge($destination, ['provider_id' => $provider->id]));
        }
    }
}