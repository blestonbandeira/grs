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
        $permission->name = "Admin";
        $permission->save();

        $permission = new PermissionLevel;
        $permission->name = "Assist";
        $permission->save();
        
        $permission = new PermissionLevel;
        $permission->name = "Inter";
        $permission->save();
    }
}
