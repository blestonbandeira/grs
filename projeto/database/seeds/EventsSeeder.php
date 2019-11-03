<?php

use Illuminate\Database\Seeder;
use App\Event;

class EventsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 13";
        $event->type = "interview";
        $event->start_event = "2019-10-14 11:00:00"; 
        $event->end_event = "2019-10-14 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 14";
        $event->type = "interview";
        $event->start_event = "2019-10-14 09:00:00"; 
        $event->end_event = "2019-10-14 9:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 15";
        $event->type = "interview";
        $event->start_event = "2019-10-14 09:45:00"; 
        $event->end_event = "2019-10-14 14:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 21";
        $event->type = "interview";
        $event->start_event = "2019-10-15 18:15:00"; 
        $event->end_event = "2019-10-15 19:30:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 22";
        $event->type = "tests";
        $event->start_event = "2019-10-15 15:00:00"; 
        $event->end_event = "2019-10-15 16:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 23";
        $event->type = "tests";
        $event->start_event = "2019-10-15 11:00:00"; 
        $event->end_event = "2019-10-15 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 24";
        $event->type = "tests";
        $event->start_event = "2019-10-15 09:00:00"; 
        $event->end_event = "2019-10-15 9:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 25";
        $event->type = "tests";
        $event->start_event = "2019-10-15 09:45:00"; 
        $event->end_event = "2019-10-15 14:45:00"; 
        $event->save();
    }
}
