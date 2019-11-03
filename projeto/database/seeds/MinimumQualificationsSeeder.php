<?php

use Illuminate\Database\Seeder;
use App\MinimumQualification;

class MinimumQualificationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $minimumQualification = new MinimumQualification;
        $minimumQualification->name = "9º Ano";
        $minimumQualification->save();

        $minimumQualification = new MinimumQualification;
        $minimumQualification->name = "12º Ano";
        $minimumQualification->save();

    }
}
