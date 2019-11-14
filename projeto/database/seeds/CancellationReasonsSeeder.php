<?php

use Illuminate\Database\Seeder;
use App\CancellationReason;

class CancellationReasonsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Ensino Superior";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Falta R&S";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Financeiros";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Habilitações";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Outra Entidade/Curso";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Pessoais / Desconhecido";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Transportes";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Emprego";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Autorização Residência";
        $cancellationReason->save();

        $cancellationReason = new CancellationReason;
        $cancellationReason->name = "Horário Curso";
        $cancellationReason->save();
    }
}
