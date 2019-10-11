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

        for($i=0; $i<5; $i++){
            for($j=0; $j<3; $j++){
                $calendar = new Calendar;
                $calendar->title = "Teste Evento ".($i+1); 
                $time = Carbon::parse(now()->addHours($j+3)->addDays($i));
                $calendar->start_event = $time; 
                $calendar->end_event = $time; 
                $calendar->save();
            }
        }

        
    }
}
