<?php

namespace Database\Seeders;

use App\Models\Event;
use Illuminate\Database\Seeder;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Event::create([
            'code' => 'EVT001',
            'name' => 'Evento de Prueba',
            'address' => '123 Calle Falsa',
            'country' => 'España',
            'city' => 'Madrid',
            'type_id' => 1,
            'resolution_code' => 'RES123',
            'start_date' => now(),
            'end_date' => now()->addDays(2),
            'open_file' => null,
            'close_file' => null,
            'start_time' => now()->format('H:i'),
        ]);
    }
}
