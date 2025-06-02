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
            [
                'name' => 'Coastal Walkway',
                'description' => 'Enjoy a serene walk along the coast with stunning ocean views and fresh sea breeze.',
                'location' => 'Sabang Coast',
                'category' => 'stroll',
                'image' => 'strolls/carou3.jpg',
            ],
            [
                'name' => 'Street Food Market',
                'description' => 'Savor local delicacies at the vibrant night market, from spicy noodles to sweet desserts.',
                'location' => 'Sabang Night Market',
                'category' => 'culiner',
                'image' => 'strolls/carou4.jpg',
            ],
            [
                'name' => 'Botanical Garden',
                'description' => 'Stroll through lush greenery and colorful blooms in this tranquil urban oasis.',
                'location' => 'Sabang Botanical Garden',
                'category' => 'stroll',
                'image' => 'strolls/carou6.jpg',
            ],
            [
                'name' => 'Rooftop Cafe',
                'description' => 'Relish gourmet dishes with a panoramic city view at this trendy rooftop spot.',
                'location' => 'Sabang Rooftop',
                'category' => 'culiner',
                'image' => 'strolls/carou8.jpg',
            ],
        ];

        foreach ($strolls as $stroll) {
            Stroll::create(array_merge($stroll, ['provider_id' => $provider->id]));
        }
    }
}