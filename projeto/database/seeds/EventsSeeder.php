<?php

use Illuminate\Database\Seeder;
use App\Event;
use App\EventType;

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
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 13";
        $event->start_event = "2019-11-13 11:00:00"; 
        $event->end_event = "2019-11-13 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 2;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 14";
        $event->start_event = "2019-11-12 09:00:00"; 
        $event->end_event = "2019-11-12 09:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type= $eventTypes[0]["id"];
        $event->title = "Teste Evento 15";
        $event->start_event = "2019-11-12 09:45:00"; 
        $event->end_event = "2019-11-12 14:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 3;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 21";
        $event->start_event = "2019-11-11 18:15:00"; 
        $event->end_event = "2019-11-11 19:30:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 22";
        $event->start_event = "2019-11-14 15:00:00"; 
        $event->end_event = "2019-11-14 16:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 4;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 23";
        $event->start_event = "2019-11-11 11:00:00"; 
        $event->end_event = "2019-11-11 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 24";
        $event->start_event = "2019-11-13 09:00:00"; 
        $event->end_event = "2019-11-13 9:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 2;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 25";
        $event->start_event = "2019-11-15 09:45:00"; 
        $event->end_event = "2019-11-15 14:45:00"; 
        $event->save();

        
    }
}
