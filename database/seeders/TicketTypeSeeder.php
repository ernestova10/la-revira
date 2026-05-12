<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TicketType;
use App\Models\Hermandad; 

class TicketTypeSeeder extends Seeder
{
    public function run(): void
    {
        $hermandades = Hermandad::all();

        foreach ($hermandades as $hermandad) {
            
            \App\Models\TicketType::create([
                'hermandad_id' => $hermandad->id,
                'name' => 'Costalero',
                'price' => 15.00,
                'stock' => 60,
            ]);

            \App\Models\TicketType::create([
                'hermandad_id' => $hermandad->id,
                'name' => 'Nazareno',
                'price' => 20.00,
                'stock' => 100,
            ]);

            \App\Models\TicketType::create([
                'hermandad_id' => $hermandad->id,
                'name' => 'Acolito',
                'price' => 20.00,
                'stock' => 20,
            ]);

        }
    }
}