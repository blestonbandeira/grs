<?php

use Illuminate\Database\Seeder;
use App\Education;

class EducationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $education = new Education;
        $education->name = "12º Ano";
        $education->save();

        $education = new Education;
        $education->name = "9º Ano";
        $education->save();

        $education = new Education;
        $education->name = "Licenciatura";
        $education->save();

        $education = new Education;
        $education->name = "Mestrado";
        $education->save();

        $education = new Education;
        $education->name = "Doutoramento";
        $education->save();

    }
}
