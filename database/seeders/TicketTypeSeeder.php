<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketType;

class TicketTypeSeeder extends Seeder
{
    public function run(): void
    {
        TicketType::create([
            'name' => 'Costalero',
            'price' => 15.00,
            'stock' => 60,
        ]);

        TicketType::create([
            'name' => 'Acólito',
            'price' => 20.00,
            'stock' => 20,
        ]);

        TicketType::create([
            'name' => 'Nazareno',
            'price' => 20.00,
            'stock' => 100,
        ]);
    }
}