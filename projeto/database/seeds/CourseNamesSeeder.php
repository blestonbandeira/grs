<?php

use Illuminate\Database\Seeder;
use App\CourseName;

class CourseNamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $courseName = new CourseName;
        $courseName->name = "Técnico de SOLDadura";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Mecatrónica Automóvel, Planeamento e Controlo de Processos";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Mecatrónica Automóvel";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico de Informática - Instalação e Gestão de Redes";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Tecnologia Mecatrónica";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "CIBERsegurança";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Mecatrónica";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Automação Robótica e Controlo Industrial";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Gestão de Redes e Sistemas Informáticos Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Tecnologias e Programação de Sistemas de Informação Porto";
        $courseName->save();
    }
}
