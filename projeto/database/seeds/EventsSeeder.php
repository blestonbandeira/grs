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
        $eventType = EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-04 11:00:00"; 
        $event->end_event = "2019-11-04 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 2;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 14";
        $eventType = EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-04 09:00:00"; 
        $event->end_event = "2019-11-04 09:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type= $eventTypes[0]["id"];
        $event->title = "Teste Evento 15";
        $eventType= EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-04 09:45:00"; 
        $event->end_event = "2019-11-04 14:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 3;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 21";
        $eventType = EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-05 18:15:00"; 
        $event->end_event = "2019-11-05 19:30:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 22";
        $eventType= EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-05 15:00:00"; 
        $event->end_event = "2019-11-05 16:45:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 4;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 23";
        $eventType = EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();~
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-05 11:00:00"; 
        $event->end_event = "2019-11-05 12:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 24";
        $eventType= EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-05 09:00:00"; 
        $event->end_event = "2019-11-05 9:15:00"; 
        $event->save();

        $event = new Event;
        $event->id_user = 2;
        $eventTypes = EventType::select('id')->where('name', '=', 'Teste')->get();
        $event->id_event_type = $eventTypes[0]["id"];
        $event->title = "Teste Evento 25";
        $eventType = EventType::select('name')->where('id', '=', $eventTypes[0]["id"])->get();
        $event->type = $eventType[0]["name"];
        $event->start_event = "2019-11-05 09:45:00"; 
        $event->end_event = "2019-11-05 14:45:00"; 
        $event->save();

        
    }
}
