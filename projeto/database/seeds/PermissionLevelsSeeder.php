<?php

use Illuminate\Database\Seeder;
use App\PermissionLevel;

class PermissionLevelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permission = new PermissionLevel;
        $permission->name = "Administrador";
        $permission->save();

        $permission = new PermissionLevel;
        $permission->name = "Assistente de Formação";
        $permission->save();
        
        $permission = new PermissionLevel;
        $permission->name = "Entrevistador";
        $permission->save();
    }
}
