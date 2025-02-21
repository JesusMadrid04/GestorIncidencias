<?php

namespace Database\Seeders;

use App\Models\Ticket;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'jesus',
            'email' => 'jesus@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'juan',
            'email' => 'juan@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'user',
        ]);

        User::factory()->create([
            'name' => 'pepe',
            'email' => 'pepe@gmail.com',
            'password' => bcrypt('1234'),
            'role' => 'user',
        ]);

        self::TicketSeeder();

    }

    private function TicketSeeder() {
        Ticket::factory(10)->create([]);
    }


}
