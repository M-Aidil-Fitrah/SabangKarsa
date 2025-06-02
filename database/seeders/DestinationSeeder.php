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
            [
                'name' => 'Pantai Iboih',
                'description' => 'Pantai eksotis dengan pasir putih dan perairan jernih yang sempurna untuk snorkeling dan diving. Terkenal dengan keindahan terumbu karangnya.',
                'location' => 'Iboih',
                'category' => 'pantai',
                'rating' => 4.5,
                'distance_from_city_center' => '15 km',
                'image' => 'destinations/carou6.jpg',
            ],
            [
                'name' => 'Tugu Kilometer Nol',
                'description' => 'Titik awal pengukuran jarak di Indonesia yang berada di ujung barat nusantara. Lokasi ikonik yang sering dikunjungi untuk berfoto.',
                'location' => 'Sabang',
                'category' => 'sejarah',
                'rating' => 4.0,
                'distance_from_city_center' => '5 km',
                'image' => 'destinations/carou7.jpg',
            ],
            [
                'name' => 'Pantai Sumur Tiga',
                'description' => 'Pantai yang terkenal dengan pasir putihnya yang lembut dan air laut yang jernih. Tempat ideal untuk berenang dan bersantai.',
                'location' => 'Sumur Tiga',
                'category' => 'pantai',
                'rating' => 4.9,
                'distance_from_city_center' => '10 km',
                'image' => 'destinations/carou8.jpg',
            ],
            [
                'name' => 'Pulau Rubiah',
                'description' => 'Surga snorkeling dan diving dengan terumbu karang yang cantik dan keanekaragaman biota laut yang menakjubkan.',
                'location' => 'Rubiah',
                'category' => 'diving',
                'rating' => 4.7,
                'distance_from_city_center' => '18 km',
                'image' => 'destinations/carou9.jpg',
            ],
            [
                'name' => 'Benteng Jepang',
                'description' => 'Situs bersejarah yang merupakan peninggalan pada masa pendudukan Jepang. Menawarkan pemandangan indah dari ketinggian.',
                'location' => 'Sabang',
                'category' => 'sejarah',
                'rating' => 3.8,
                'distance_from_city_center' => '8 km',
                'image' => 'destinations/carou10.jpg',
            ],
            [
                'name' => 'Gunung Api Sabang',
                'description' => 'Gunung berapi yang sudah tidak aktif. Menawarkan trek pendakian yang menantang dengan pemandangan laut yang spektakuler dari puncaknya.',
                'location' => 'Sabang',
                'category' => 'gunung',
                'rating' => 4.2,
                'distance_from_city_center' => '12 km',
                'image' => 'destinations/carou11.jpg',
            ],
        ];

        foreach ($destinations as $destination) {
            Destination::create(array_merge($destination, ['provider_id' => $provider->id]));
        }
    }
}