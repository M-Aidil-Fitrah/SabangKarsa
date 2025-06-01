<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\TourGuide;

class TourGuideSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::where('role', 'provider')->first();
        if (!$provider) {
            $provider = User::factory()->create(['role' => 'provider', 'name' => 'Provider User', 'email' => 'provider@example.com', 'password' => bcrypt('password')]);
        }

        $tour_guides = [
            ['name' => 'Jane Smith', 'phone' => '08123456791', 'experience' => '5 years guiding in Sabang', 'price_per_day' => 250000, 'image' => 'storage/img/carou7.jpg'],
            ['name' => 'Rina Sari', 'phone' => '08123456792', 'experience' => '3 years guiding experience', 'price_per_day' => 200000, 'image' => 'storage/img/carou8.jpg'],
        ];

        foreach ($tour_guides as $tour_guide) {
            TourGuide::create(array_merge($tour_guide, ['provider_id' => $provider->id]));
        }
    }
}