<?php

use Illuminate\Database\Seeder;
use App\Regime;

class RegimesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $regime = new Regime;
        $regime->name = "Diurno";
        $regime->save();

        $regime = new Regime;
        $regime->name = "Pós-Laboral";
        $regime->save();

        $regime = new Regime;
        $regime->name = "Nocturno";
        $regime->save();

    }
}
