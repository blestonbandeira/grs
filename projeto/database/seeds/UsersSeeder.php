<?php

use Illuminate\Database\Seeder;
use App\User;
use App\PermissionLevel;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissionLevels = PermissionLevel::select('id')->where('name', '=', 'Administrador')->get();
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->permission_level_id = $permissionLevels[0]["id"];
        $user->save();

        $permissionLevels = PermissionLevel::select('id')->where('name', '=', 'Assistente de Formação')->get();
        $user = new User;
        $user->name = "Assist";
        $user->email = "assist@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->permission_level_id = $permissionLevels[0]["id"];
        $user->save();

        $permissionLevels = PermissionLevel::select('id')->where('name', '=', 'Entrevistador')->get();
        $user = new User;
        $user->name = "Inter";
        $user->email = "inter@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->permission_level_id = $permissionLevels[0]["id"];
        $user->save();
    
        $permissionLevels = PermissionLevel::select('id')->where('name', '=', 'Entrevistador')->get();
        $user = new User;
        $user->name = "Inter2";
        $user->email = "inter2@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->permission_level_id = $permissionLevels[0]["id"];
        $user->save();

        $permissionLevels = PermissionLevel::select('id')->where('name', '=', 'Assistente de Formação')->get();
        $user = new User;
        $user->name = "Assist2";
        $user->email = "assist2@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->permission_level_id = $permissionLevels[0]["id"];
        $user->save();

        $permissionLevels = PermissionLevel::select('id')->where('name', '=', 'Assistente de Formação')->get();
        $user = new User;
        $user->name = "Assist3";
        $user->email = "assist3@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->permission_level_id = $permissionLevels[0]["id"];
        $user->save();
    }
}
