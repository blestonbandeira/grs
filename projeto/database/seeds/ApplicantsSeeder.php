<?php

use Illuminate\Database\Seeder;
use App\Applicant;
use App\Category;
use App\Course;
use App\District;
use App\Education;
use App\Gender;
use App\RegistrationState;
use App\Origin;
use App\RsClass;
use App\UnemploymentSituation;

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
        $genders = Genders::select('id')->where('name', '=', 'Feminino')->get();
        $applicant->id_gender = $genders[0]["id"];
        $applicant->birthdate = '1980-02-28';
        $registrationStates = RegistrationStates::select('id')->where('name', '=', 'Activo')->get();
        $applicant->id_registrationState = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-05';
        $origins = Origin::select('id')->where('name', '=', 'Facebook')->get();
        $applicant->origin = $origins[0]["id"];
        $unemployementSituations = UnemploymentSituation::select('id')->where('name', '=', 'Desempregada/o')->get();
        $applicant->unemployementSituation = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano')->get();
        $applicant->education = $educations[0]["id"];
        $applicant->previousSchool = 'Lyceu Camões';
        $applicant->phoneNumber = '956647898';
        $districts = District::select('id')->where('name', '=', 'Aveiro');
        $applicant->district = $districts[0]["id"];
        $applicant->parish = 'Guifães';
        $applicant->town = 'Aveiro';
        $applicant->email = 'applicant@m.pt';        
        $firstCourseOptions = Course::select('id')->where('name', '=', 'Tecnologias e Programação de Sistemas de Informação Porto')->get();
        $applicant->firstCourseOption = $firstCourseOptions[0]["id"];
        $secondCourseOptions = Course::select('id')->where('name', '=', 'Tecnologias e Programação de Sistemas de Informação Porto')->get();
        if ($secondCourseOptions != nullOrEmptyString()) {
            $applicant->secondCourseOptions = $secondCourseOptions[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('name', '=', 'TPSIP_12.19')->get();
        $applicant->rsClass = $rsClasses[0]["id"];
        $applicant->apt = "false";
        $categories = Category::select('id')->where('name', '=', 'Em R&S')->get();
        $applicant->id_category = $categories[0]["id"];
        $applicant->save();


    }
}
