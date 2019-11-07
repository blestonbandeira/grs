<?php

use Illuminate\Database\Seeder;
use App\UnemploymentSituation;

class UnemploymentSituationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unemploymentSitutation = new UnemploymentSituation;
        $unemploymentSitutation->name = "Desempregada/o";
        $unemploymentSitutation->save();

        $unemploymentSitutation = new UnemploymentSituation;
        $unemploymentSitutation->name = "Empregada/o a Tempo Inteiro";
        $unemploymentSitutation->save();

        $unemploymentSitutation = new UnemploymentSituation;
        $unemploymentSitutation->name = "Empregada/o em part-time";
        $unemploymentSitutation->save();

    }
}
