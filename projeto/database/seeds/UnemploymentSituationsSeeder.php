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
        $unemploymentSitutation->name = "Desempregado";
        $unemploymentSitutation->save();

        $unemploymentSitutation = new UnemploymentSituation;
        $unemploymentSitutation->name = "Empregado a Tempo Inteiro";
        $unemploymentSitutation->save();

        $unemploymentSitutation = new UnemploymentSituation;
        $unemploymentSitutation->name = "Empregado em part-time";
        $unemploymentSitutation->save();

    }
}
