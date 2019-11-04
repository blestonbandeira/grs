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
        $permissionLevels = DB::table('permission_levels')->select('id')->where('name', '=', 'Admin')->first();
        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = $permissionLevels;
        $user->save();

        $permissionLevels = DB::table('permission_levels')->select('id')->where('name', '=', 'Assist')->first();
        $user = new User;
        $user->name = "Assist";
        $user->email = "assist@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = $permissionLevels;
        $user->save();

        $permissionLevels = DB::table('permission_levels')->select('id')->where('name', '=', 'Inter')->first();
        $user = new User;
        $user->name = "Inter";
        $user->email = "inter@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = $permissionLevels;
        $user->save();
    
        $permissionLevels = DB::table('permission_levels')->select('id')->where('name', '=', 'Inter')->first();
        $user = new User;
        $user->name = "Inter2";
        $user->email = "inter2@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = $permissionLevels;
        $user->save();

        $permissionLevels = DB::table('permission_levels')->select('id')->where('name', '=', 'Assist')->first();
        $user = new User;
        $user->name = "Assist2";
        $user->email = "assist2@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = $permissionLevels;
        $user->save();

        $permissionLevels = DB::table('permission_levels')->select('id')->where('name', '=', 'Assist')->first();
        $user = new User;
        $user->name = "Assist3";
        $user->email = "assist3@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = $permissionLevels;
        $user->save();
    }
}
