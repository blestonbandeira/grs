<?php

use Illuminate\Database\Seeder;
use App\FileType;

class FileTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fileType = new FileType;
        $fileType->name = "Formulário de Inscrição";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Cartão de Cidadão";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Certificado de Habilitações";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Declaração de Situação de (Des)Emprego";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Curriculum Vitae";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Registo Criminal";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Atestado Médico";
        $fileType->save();

        $fileType = new FileType;
        $fileType->name = "Data Assessment";
        $fileType->save();
        
        
    }
}
