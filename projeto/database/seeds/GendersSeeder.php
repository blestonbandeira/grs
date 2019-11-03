<?php

use Illuminate\Database\Seeder;
use App\Gender;

class GendersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gender = new Gender;
        $gender->name = "Feminino";
        $gender->save();

        $gender = new Gender;
        $gender->name = "Masculino";
        $gender->save();
    }
}
