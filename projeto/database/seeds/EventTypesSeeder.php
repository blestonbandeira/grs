<?php

use Illuminate\Database\Seeder;
use App\EventType;

class EventTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $eventType = new EventType;
        $eventType->name = "Entrevista";
        $eventType->save();

        $eventType = new EventType;
        $eventType->name = "Teste";
        $eventType->save();

        $eventType = new EventType;
        $eventType->name = "Inventário";
        $eventType->save();

        $eventType = new EventType;
        $eventType->name = "Disponibilidade";
        $eventType->save();

    }
}
