<?php

use Illuminate\Database\Seeder;
use App\DocumentType;

class DocumentTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $documentType = new DocumentType;
        $documentType->name = "Formulário de Inscrição";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Cartão de Cidadão";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Certificado de Habilitações";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Declaração de Situação de (Des)Emprego";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Curriculum Vitae";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Registo Criminal";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Atestado Médico";
        $documentType->save();

        $documentType = new DocumentType;
        $documentType->name = "Data Assessment";
        $documentType->save();
        
    }
}
