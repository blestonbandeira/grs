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
        $origin->name = "Familiares/Amigos";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Internet/Facebook";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Escola Anterior - Feira das Profissões";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Escola Anterior - Formador(a)/Professor(a)";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Escola Anterior - Psicólogo(a)";
        $origin->save();

        $origin = new Origin;
        $origin->name = "ATEC - Formando(a)/Ex-Formando(a)";
        $origin->save();

        $origin = new Origin;
        $origin->name = "ATEC - Feira das Profissões / Open Day";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Conclusão Nível IV Na ATEC";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Qualifica / Futurália / Exponor";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Sessão de Divulgação IEFP";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Rádio";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Publicidade impressa";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Flyer";
        $origin->save();

        $origin = new Origin;
        $origin->name = "STCP";
        $origin->save();

        $origin = new Origin;
        $origin->name = "Outro";
        $origin->save();

      
    }
}
