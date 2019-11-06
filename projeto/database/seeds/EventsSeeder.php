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
        $event->start_event = "2019-11-04 11:00:00"; 
        $event->end_event = "2019-11-04 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 14";
        $event->type = "interview";
        $event->start_event = "2019-11-04 09:00:00"; 
        $event->end_event = "2019-11-04 09:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 15";
        $event->type = "interview";
        $event->start_event = "2019-11-04 09:45:00"; 
        $event->end_event = "2019-11-04 14:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 21";
        $event->type = "interview";
        $event->start_event = "2019-11-05 18:15:00"; 
        $event->end_event = "2019-11-05 19:30:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 22";
        $event->type = "tests";
        $event->start_event = "2019-11-05 15:00:00"; 
        $event->end_event = "2019-11-05 16:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 23";
        $event->type = "tests";
        $event->start_event = "2019-11-05 11:00:00"; 
        $event->end_event = "2019-11-05 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 24";
        $event->type = "tests";
        $event->start_event = "2019-11-05 09:00:00"; 
        $event->end_event = "2019-11-05 9:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 25";
        $event->type = "tests";
        $event->start_event = "2019-11-05 09:45:00"; 
        $event->end_event = "2019-11-05 14:45:00"; 
        $event->save();

        
    }
}
