<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Category;
use App\Course;
use App\CourseName;
use App\District;
use App\Education;
use App\Gender;
use App\RegistrationState;
use App\Origin;
use App\RsClass;
use App\UnemployementSituation;

class ApplicantsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // for($i=0; $i<20; $i++){
        //     $applicant = new Applicant;
        //     $applicant->name = "Teste Aluno ".(string)($i+1); 
        //     $applicant->email = "testealuno".(string)($i+1)."@mail.com"; 
        //     $applicant->town = "Porto"; 
        //     $applicant->save();
        // }
        $applicant = new Applicant;
        $applicant->name = "BLB";
        $nif = '227550404';
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }        
        $genders = Gender::select('id')->where('name', '=', 'Feminino')->get();
        $applicant->id_gender = $genders[0]["id"];
        $applicant->birthdate = '1980-02-28';
        $registrationStates = RegistrationState::select('id')->where('name', '=', 'Activo')->get();
        $applicant->id_registrationState = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-05';
        $origins = Origin::select('id')->where('name', '=', 'Facebook')->get();
        $applicant->id_origin = $origins[0]["id"];
        $unemployementSituations = UnemployementSituation::select('id')->where('name', '=', 'Desempregada/o')->get();
        $applicant->id_unemployementSituation = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano')->get();
        $applicant->id_education = $educations[0]["id"];
        $applicant->previousSchool = 'Lyceu Camões';
        $applicant->phoneNumber = '956647898';
        $districts = District::select('id')->where('name', '=', 'Aveiro')->get();
        $applicant->id_district = $districts[0]["id"];
        $applicant->parish = 'Guifães';
        $applicant->town = 'Aveiro';
        $applicant->email = 'applicant@m.pt';        
        $firstOptionCourses = CourseName::select('id')->where('name', '=', 'Tecnologias e Programação de Sistemas de Informação Porto')->get();
        $applicant->id_firstOptionCourse = $firstOptionCourses[0]["id"];
        $secondOptionCourses = CourseName::select('id')->where('name', '=', 'Gestão de Redes e Sistemas Informáticos Porto')->get();
        if ($secondOptionCourses != "") {
            $applicant->id_secondOptionCourse = $secondOptionCourses[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('id_courseName', '=', $applicant->id_firstOptionCourse)->get();
        $applicant->id_rsClass = $rsClasses[0]["id"];
        $applicant->apt = false;
        $categories = Category::select('id')->where('name', '=', 'Em R&S')->get();
        $applicant->id_category = $categories[0]["id"];
        $applicant->save();

        $applicant = new Applicant;
        $applicant->name = "SM";
        $nif = '227550404';
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }        
        $genders = Gender::select('id')->where('name', '=', 'Masculino')->get();
        $applicant->id_gender = $genders[0]["id"];
        $applicant->birthdate = '2000-02-28';
        $registrationStates = RegistrationState::select('id')->where('name', '=', 'Activo')->get();
        $applicant->id_registrationState = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-07';
        $origins = Origin::select('id')->where('name', '=', 'Instagram')->get();
        $applicant->id_origin = $origins[0]["id"];
        $unemployementSituations = UnemployementSituation::select('id')->where('name', '=', 'Empregada/o em part-time')->get();
        $applicant->id_unemployementSituation = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano')->get();
        $applicant->id_education = $educations[0]["id"];
        $applicant->previousSchool = 'Escola Profissional Bento de Jesus Caraça';
        $applicant->phoneNumber = '978975123';
        $districts = District::select('id')->where('name', '=', 'Beja')->get();
        $applicant->id_district = $districts[0]["id"];
        $applicant->parish = 'Beja';
        $applicant->town = 'Beja';
        $applicant->email = 'sergio@m.pt';        
        $firstOptionCourses = CourseName::select('id')->where('name', '=', 'Gestão de Redes e Sistemas Informáticos Porto')->get();
        $applicant->id_firstOptionCourse = $firstOptionCourses[0]["id"];
        $secondOptionCourses = CourseName::select('id')->where('name', '=', 'Tecnologias e Programação de Sistemas de Informação Porto')->get();
        if ($secondOptionCourses != "") {
            $applicant->id_secondOptionCourse = $secondOptionCourses[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('id_courseName', '=', $applicant->id_firstOptionCourse)->get();
        $applicant->id_rsClass = $rsClasses[0]["id"];
        $applicant->apt = false;
        $categories = Category::select('id')->where('name', '=', 'Para R&S')->get();
        $applicant->id_category = $categories[0]["id"];
        $applicant->save();


    }
}
