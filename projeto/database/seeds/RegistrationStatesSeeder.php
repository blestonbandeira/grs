<?php

use Illuminate\Database\Seeder;
use App\RegistrationState;

class RegistrationStatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registrationState = new RegistrationState;
        $registrationState->name = "Activo";
        $registrationState->save();

        $registrationState = new RegistrationState;
        $registrationState->name = "Inactivo";
        $registrationState->save();
    }
}
