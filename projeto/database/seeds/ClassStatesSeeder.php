<?php

use Illuminate\Database\Seeder;
use App\ClassState;

class ClassStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classState = new ClassState;
        $classState->name = "Turma Iniciada";
        $classState->save();

        $classState = new ClassState;
        $classState->name = "Turma Cancelada";
        $classState->save();
    }
}
