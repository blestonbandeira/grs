<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Event;
use App\User;
use Carbon\Carbon;
use App\PermissionLevel;
use App\RsClass;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(PermissionLevelsSeeder::class);
        // $this->call(UsersSeeder::class);
        // $this->call(ApplicantsSeeder::class);
        // $this->call(EventsSeeder::class);
        // $this->call(DistrictsSeeder::class);
        // $this->call(TestTypesSeeder::class);
        // $this->call(RegimesSeeder::class);
        // $this->call(MinimumQualificationsSeeder::class);
        // $this->call(CourseTypesSeeder::class);
        // $this->call(CourseNamesSeeder::class);
        // $this->call(CoursesSeeder::class);
        // $this->call(CategoriesSeeder::class);
        // $this->call(GendersSeeder::class);
        // $this->call(OriginsSeeder::class);
        // $this->call(RegistrationStatesSeeder::class);
        // $this->call(EducationsSeeder::class);
        // $this->call(ClassStatesSeeder::class);
        $this->call(RsClassesSeeder::class);

        
        
    }
}
