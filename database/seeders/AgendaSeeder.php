<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Agenda;

class AgendaSeeder extends Seeder
{
    public function run(): void
    {
        $provider = User::where('role', 'provider')->first();
        if (!$provider) {
            $provider = User::factory()->create(['role' => 'provider', 'name' => 'Provider User', 'email' => 'provider@example.com', 'password' => bcrypt('password')]);
        }

        $agendas = [
            ['name' => 'Sabang Sail', 'description' => 'Sabang Sail is an annual event showcasing the beauty and culture of Sabang Island, attracting visitors from around the world.', 'image' => 'agendas/carou5.jpg'],
            ['name' => 'Open Diving Festival', 'description' => 'The Open Diving Festival is a celebration of underwater exploration, featuring diving competitions, workshops, and marine conservation activities.', 'image' => 'agendas/carou7.jpg'],
            ['name' => 'Event Tour de Sabang', 'description' => 'Event Tour de Sabang is a cycling event that takes participants through the scenic routes of Sabang, promoting eco-tourism and healthy living.', 'image' => 'agendas/carou8.jpg'],
        ];

        foreach ($agendas as $agenda) {
            Agenda::create(array_merge($agenda, ['provider_id' => $provider->id]));
        }
    }
}