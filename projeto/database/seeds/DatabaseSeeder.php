<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Event;
use App\User;
use Carbon\Carbon;
use App\PermissionLevel;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
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


        $user = new User;
        $user->name = "Admin";
        $user->email = "admin@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = 1;
        $user->save();

        $user = new User;
        $user->name = "Assist";
        $user->email = "assist@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = 2;
        $user->save();

        $user = new User;
        $user->name = "Inter";
        $user->email = "inter@m.pt";
        $user->password = bcrypt("123++qwe");
        $user->id_permissionLevel = 3;
        $user->save();
        
        // $this->call(UsersTableSeeder::class);
        for($i=0; $i<20; $i++){
            $applicant = new Applicant;
            $applicant->name = "Teste Aluno ".(string)($i+1); 
            $applicant->email = "testealuno".(string)($i+1)."@mail.com"; 
            $applicant->town = "Porto"; 
            $applicant->save();
        }
        
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 13";
        $event->type = "interview";
        $event->start_event = "2019-10-14 11:00:00"; 
        $event->end_event = "2019-10-14 12:15:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 14";
        $event->type = "interview";
        $event->start_event = "2019-10-14 09:00:00"; 
        $event->end_event = "2019-10-14 9:15:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 15";
        $event->type = "interview";
        $event->start_event = "2019-10-14 09:45:00"; 
        $event->end_event = "2019-10-14 14:45:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 21";
        $event->type = "interview";
        $event->start_event = "2019-10-15 18:15:00"; 
        $event->end_event = "2019-10-15 19:30:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 22";
        $event->type = "tests";
        $event->start_event = "2019-10-15 15:00:00"; 
        $event->end_event = "2019-10-15 16:45:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 23";
        $event->type = "tests";
        $event->start_event = "2019-10-15 11:00:00"; 
        $event->end_event = "2019-10-15 12:15:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 24";
        $event->type = "tests";
        $event->start_event = "2019-10-15 09:00:00"; 
        $event->end_event = "2019-10-15 9:15:00"; 
        $event->save();
        $event = new Event;
        $event->id_user = 1;
        $event->title = "Teste Evento 25";
        $event->type = "tests";
        $event->start_event = "2019-10-15 09:45:00"; 
        $event->end_event = "2019-10-15 14:45:00"; 
        $event->save();

        
        
    }
}
