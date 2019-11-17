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
        $event->user_id = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 22";
        $event->start_event = "2019-11-18 11:00:00"; 
        $event->end_event = "2019-11-18 20:20:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 2;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 14";
        $event->start_event = "2019-11-20 09:00:00"; 
        $event->end_event = "2019-11-20 09:20:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->event_type_id= $eventTypes[0]["id"];
        $event->title = "Teste Evento 20";
        $event->start_event = "2019-11-20 09:45:00"; 
        $event->end_event = "2019-11-20 14:45:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 3;
        $eventTypes = EventType::select('id')->where('name', '=', 'Entrevista')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 21";
        $event->start_event = "2019-11-21 18:20:00"; 
        $event->end_event = "2019-11-21 19:30:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Provas de Selecção')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 22";
        $event->start_event = "2019-21-14 20:00:00"; 
        $event->end_event = "2019-21-14 16:45:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 4;
        $eventTypes = EventType::select('id')->where('name', '=', 'Provas de Selecção')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 23";
        $event->start_event = "2019-11-21 11:00:00"; 
        $event->end_event = "2019-11-21 20:20:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 1;
        $eventTypes = EventType::select('id')->where('name', '=', 'Provas de Selecção')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 24";
        $event->start_event = "2019-11-22 09:00:00"; 
        $event->end_event = "2019-11-22 9:20:00"; 
        $event->save();

        $event = new Event;
        $event->user_id = 2;
        $eventTypes = EventType::select('id')->where('name', '=', 'Provas de Selecção')->get();
        $event->event_type_id = $eventTypes[0]["id"];
        $event->title = "Teste Evento 25";
        $event->start_event = "2019-11-20 09:45:00"; 
        $event->end_event = "2019-11-20 14:45:00"; 
        $event->save();

        
    }
}
