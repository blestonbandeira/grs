<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Interview;

class InterviewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $interview = new Interview;
        $interview->applicant_id = 1;
        $interview->date = 2019-11-13;
        $interview->result = "Aceite(1)";
        $interview->save();

        $interview = new Interview;
        $interview->applicant_id = 3;
        $interview->date = 2019-11-23;
        $interview->result = "Aceite(2)";
        $interview->save();

        $interview = new Interview;
        $interview->applicant_id = 4;
        $interview->date = 2019-10-25;
        $interview->result = "Aceite c/reserva";
        $interview->save();
    }
}
