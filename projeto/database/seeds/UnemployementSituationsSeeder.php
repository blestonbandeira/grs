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
        $unemployementSitutation->name = "Desempregado/a";
        $unemployementSitutation->save();

        $unemployementSitutation = new UnemployementSituation;
        $unemployementSitutation->name = "Empregado/a";
        $unemployementSitutation->save();

    }
}
