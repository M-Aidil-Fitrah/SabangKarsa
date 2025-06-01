<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Stroll;

class StrollSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::where('role', 'provider')->first();
        if (!$provider) {
            $provider = User::factory()->create(['role' => 'provider', 'name' => 'Provider User', 'email' => 'provider@example.com', 'password' => bcrypt('password')]);
        }

        $strolls = [
            ['name' => 'Warung Makan Iboih', 'description' => 'Local seafood restaurant', 'location' => 'Pantai Iboih', 'category' => 'kuliner', 'image' => 'storage/img/carou11.jpg'],
            ['name' => 'Jalan Pasar Sabang', 'description' => 'Scenic walking area', 'location' => 'Sabang City', 'category' => 'jalan-jalan', 'image' => 'storage/img/carou12.jpg'],
        ];

        foreach ($strolls as $stroll) {
            Stroll::create(array_merge($stroll, ['provider_id' => $provider->id]));
        }
    }
}