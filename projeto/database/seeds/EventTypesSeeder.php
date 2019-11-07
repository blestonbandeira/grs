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
        $eventType->name = "Interview";
        $eventType->save();

        $eventType = new EventType;
        $eventType->name = "Test";
        $eventType->save();

        $eventType = new EventType;
        $eventType->name = "Inventory";
        $eventType->save();

    }
}
