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
        $courseName->name = "Técnico/a Especialista em Mecatrónica Automóvel, Planeamento e Controlo de Processos";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico/a de Mecatrónica Automóvel";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico/a de Mecatrónica";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico/a Especialista em Cibersegurança";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico/a Especialista em Automação Robótica e Controlo Industrial";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico/a Especialista Gestão de Redes e Sistemas Informáticos";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Técnico/a Especialista em Tecnologias e Programação de Sistemas de Informação";
        $courseName->save();
    }
}
