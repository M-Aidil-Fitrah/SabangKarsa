<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Driver;

class DriverSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::where('role', 'provider')->first();
        if (!$provider) {
            $provider = User::factory()->create(['role' => 'provider', 'name' => 'Provider User', 'email' => 'provider@example.com', 'password' => bcrypt('password')]);
        }

        $drivers = [
            ['name' => 'John Doe', 'phone' => '08123456789', 'vehicle_type' => 'SUV', 'price_per_day' => 300000, 'image' => 'storage/img/carou4.jpg'],
            ['name' => 'Ahmad Yani', 'phone' => '08123456790', 'vehicle_type' => 'Sedan', 'price_per_day' => 250000, 'image' => 'storage/img/carou6.jpg'],
        ];

        foreach ($drivers as $driver) {
            Driver::create(array_merge($driver, ['provider_id' => $provider->id]));
        }
    }
}