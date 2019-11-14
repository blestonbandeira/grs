<?php

use App\ProvenanceSchool;
use Illuminate\Database\Seeder;

class ProvenanceSchoolsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "ACTUAL GEST - Formação Profissional";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "AEP - Associação Empresarial de Penafiel";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas D. Pedro IV";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas da Sé-Lamego";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas Daniel Faria";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Alfena";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Alpendorada";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Argoncilhe";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Arouca";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Barcelos";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Benavente";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Benavente";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de escolas de Estarreja";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de escolas de Estarreja";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Mirandela";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Pinheiro";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Resende";
        $provenanceSchool->save();

        $provenanceSchool = new ProvenanceSchool;
        $provenanceSchool->name = "Agrupamento de Escolas de Torre de Moncorvo";
        $provenanceSchool->save();
    }
}
