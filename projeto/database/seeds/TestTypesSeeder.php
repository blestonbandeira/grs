<?php

use Illuminate\Database\Seeder;
use App\TestType;

class TestTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $testType = new TestType;
        $testType->name = "Teste Psicotécnico";
        $testType->save();

        $testType = new TestType;
        $testType->name = "Prova de Aferição";
        $testType->save();

        $testType = new TestType;
        $testType->name = "Inventário Vocacional";
        $testType->save();
    }
}
