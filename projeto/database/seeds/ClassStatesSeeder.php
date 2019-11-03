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
        $classState->name = "Activo";
        $classState->save();

        $classState = new ClassState;
        $classState->name = "Inactivo";
        $classState->save();
    }
}
