<?php

use Illuminate\Database\Seeder;
use App\UnemployementSituation;

class UnemployementSituationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unemployementSitutation = new UnemployementSituation;
        $unemployementSitutation->name = "Desempregada/o";
        $unemployementSitutation->save();

        $unemployementSitutation = new UnemployementSituation;
        $unemployementSitutation->name = "Empregada/o a Tempo Inteiro";
        $unemployementSitutation->save();

        $unemployementSitutation = new UnemployementSituation;
        $unemployementSitutation->name = "Empregada/o em part-time";
        $unemployementSitutation->save();

    }
}
