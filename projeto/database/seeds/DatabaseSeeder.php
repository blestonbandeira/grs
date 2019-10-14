<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Calendar;
use Carbon\Carbon;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        for($i=0; $i<20; $i++){
            $applicant = new Applicant;
            $applicant->name = "Teste Aluno ".(string)($i+1); 
            $applicant->email = "testealuno".(string)($i+1)."@mail.com"; 
            $applicant->town = "Porto"; 
            $applicant->save();
        }

        $calendar = new Calendar;
        $calendar->title = "Teste Evento 11";
        $calendar->start_event = "2019-10-14 18:15:00"; 
        $calendar->end_event = "2019-10-14 19:30:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 12";
        $calendar->start_event = "2019-10-14 15:00:00"; 
        $calendar->end_event = "2019-10-14 16:45:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 13";
        $calendar->start_event = "2019-10-14 11:00:00"; 
        $calendar->end_event = "2019-10-14 12:15:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 14";
        $calendar->start_event = "2019-10-14 09:00:00"; 
        $calendar->end_event = "2019-10-14 9:15:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 15";
        $calendar->start_event = "2019-10-14 09:45:00"; 
        $calendar->end_event = "2019-10-14 14:45:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 21";
        $calendar->start_event = "2019-10-15 18:15:00"; 
        $calendar->end_event = "2019-10-15 19:30:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 22";
        $calendar->start_event = "2019-10-15 15:00:00"; 
        $calendar->end_event = "2019-10-15 16:45:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 23";
        $calendar->start_event = "2019-10-15 11:00:00"; 
        $calendar->end_event = "2019-10-15 12:15:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 24";
        $calendar->start_event = "2019-10-15 09:00:00"; 
        $calendar->end_event = "2019-10-15 9:15:00"; 
        $calendar->save();
        $calendar = new Calendar;
        $calendar->title = "Teste Evento 25";
        $calendar->start_event = "2019-10-15 09:45:00"; 
        $calendar->end_event = "2019-10-15 14:45:00"; 
        $calendar->save();

        
        
    }
}
