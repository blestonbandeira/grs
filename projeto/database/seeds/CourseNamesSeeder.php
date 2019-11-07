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
        $courseName->name = "Mecatrónica Automóvel, Planeamento e Controlo de Processos Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Mecatrónica Automóvel Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Mecatrónica Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Ciber Segurança Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Automação Robótica e Controlo Industrial Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Gestão de Redes e Sistemas Informáticos Porto";
        $courseName->save();

        $courseName = new CourseName;
        $courseName->name = "Tecnologias e Programação de Sistemas de Informação Porto";
        $courseName->save();
    }
}
