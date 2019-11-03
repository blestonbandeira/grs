<?php

use Illuminate\Database\Seeder;
use App\Origin;

class OriginsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $origin = new Origin;
        $origin->name = "Facebook";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Instagram";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Google";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Rádio";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Publicidade impressa";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Família";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Amigos";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Escola";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Qualifica / Futurália";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Feira das Profissões / Open Day";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Sessão de Divulgação IEFP";
        $origin->save();
    }
}
