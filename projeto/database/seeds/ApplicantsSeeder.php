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
use App\ProvenanceSchool;
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
      
        $applicant = new Applicant;
        $applicant->name = "BLB";
        $nif = '227550404';
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }        
        $genders = Gender::select('id')->where('name', '=', 'Feminino')->get();
        $applicant->gender_id = $genders[0]["id"];
        $applicant->birthdate = '1980-02-28';
        $registrationStates = RegistrationState::select('id')->where('name', '=', 'Activo')->get();
        $applicant->registration_state_id = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-05';
        $origins = Origin::select('id')->where('name', '=', 'Internet/Facebook')->get();
        $applicant->origin_id = $origins[0]["id"];
        $unemployementSituations = UnemployementSituation::select('id')->where('name', '=', 'Desempregado/a')->get();
        $applicant->unemployement_situation_id = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano')->get();
        $applicant->education_id = $educations[0]["id"];
        $applicant->phoneNumber = '956647898';
        $districts = District::select('id')->where('name', '=', 'Aveiro')->get();
        $applicant->district_id = $districts[0]["id"];
        $applicant->parish = 'Guifães';
        $applicant->town = 'Aveiro';
        $applicant->email = 'applicant@m.pt';        
        $firstOptionCourses = CourseName::select('id')->where('name', '=', 'Técnico de SOLDadura')->get();
        $applicant->first_option_course_id = $firstOptionCourses[0]["id"];
        $secondOptionCourses = CourseName::select('id')->where('name', '=', 'Mecatrónica')->get();
        if ($secondOptionCourses != "") {
            $applicant->second_option_course_id = $secondOptionCourses[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('course_name_id', '=', $applicant->first_option_course_id)->get();
        $applicant->rs_class_id = $rsClasses[0]["id"];
        $applicant->apt = false;
        $categories = Category::select('id')->where('name', '=', 'R&S Completo')->get();
        $applicant->category_id = $categories[0]["id"];
        $applicant->save();


        $applicant = new Applicant;
        $applicant->name = "SM";
        $nif = '235383830';
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }        
        $genders = Gender::select('id')->where('name', '=', 'Masculino')->get();
        $applicant->gender_id = $genders[0]["id"];
        $applicant->birthdate = '2000-02-28';
        $registrationStates = RegistrationState::select('id')->where('name', '=', 'Activo')->get();
        $applicant->registration_state_id = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-07';
        $origins = Origin::select('id')->where('name', '=', 'Escola Anterior - Feira das Profissões')->get();
        $applicant->origin_id = $origins[0]["id"];
        $unemployementSituations = UnemployementSituation::select('id')->where('name', '=', 'Empregado/a')->get();
        $applicant->unemployement_situation_id = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano incompleto')->get();
        $applicant->education_id = $educations[0]["id"];
        $applicant->phoneNumber = '978975123';
        $districts = District::select('id')->where('name', '=', 'Beja')->get();
        $applicant->district_id = $districts[0]["id"];
        $applicant->parish = 'Beja';
        $applicant->town = 'Beja';
        $applicant->email = 'sergio@m.pt';        
        $firstOptionCourses = CourseName::select('id')->where('name', '=', 'Mecatrónica Automóvel, Planeamento e Controlo de Processos')->get();
        $applicant->first_option_course_id = $firstOptionCourses[0]["id"];
        $secondOptionCourses = CourseName::select('id')->where('name', '=', 'CIBERsegurança')->get();
        if ($secondOptionCourses != "") {
            $applicant->second_option_course_id = $secondOptionCourses[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('course_name_id', '=', $applicant->first_option_course_id)->get();
        $applicant->rs_class_id = $rsClasses[0]["id"];
        $applicant->apt = false;
        $categories = Category::select('id')->where('name', '=', 'Candidatura Para R&S')->get();
        $applicant->category_id = $categories[0]["id"];
        $applicant->save();



        $applicant = new Applicant;
        $applicant->name = "IF";
        $nif = '235383830';
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }        
        $genders = Gender::select('id')->where('name', '=', 'Feminino')->get();
        $applicant->gender_id = $genders[0]["id"];
        $applicant->birthdate = '2000-02-28';
        $registrationStates = RegistrationState::select('id')->where('name', '=', 'Inactivo')->get();
        $applicant->registration_state_id = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-07';
        $origins = Origin::select('id')->where('name', '=', 'Escola Anterior - Feira das Profissões')->get();
        $applicant->origin_id = $origins[0]["id"];
        $unemployementSituations = UnemployementSituation::select('id')->where('name', '=', 'Empregado/a')->get();
        $applicant->unemployement_situation_id = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano')->get();
        $applicant->education_id = $educations[0]["id"];
        $applicant->phoneNumber = '978975123';
        $districts = District::select('id')->where('name', '=', 'Faro')->get();
        $applicant->district_id = $districts[0]["id"];
        $applicant->parish = 'Faro';
        $applicant->town = 'Faro';
        $applicant->email = 'sergio@m.pt';        
        $firstOptionCourses = CourseName::select('id')->where('name', '=', 'Mecatrónica Automóvel, Planeamento e Controlo de Processos')->get();
        $applicant->first_option_course_id = $firstOptionCourses[0]["id"];
        $secondOptionCourses = CourseName::select('id')->where('name', '=', 'CIBERsegurança')->get();
        if ($secondOptionCourses != "") {
            $applicant->second_option_course_id = $secondOptionCourses[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('course_name_id', '=', $applicant->first_option_course_id)->get();
        $applicant->rs_class_id = $rsClasses[0]["id"];
        $applicant->apt = false;
        $categories = Category::select('id')->where('name', '=', 'Candidatura Para R&S')->get();
        $applicant->category_id = $categories[0]["id"];
        $applicant->save();

        $applicant = new Applicant;
        $applicant->name = "BR";
        $nif = '235383831';
        if (validaNIF($nif)) {
            $applicant->nif = $nif;
        }        
        $genders = Gender::select('id')->where('name', '=', 'Masculino')->get();
        $applicant->gender_id = $genders[0]["id"];
        $applicant->birthdate = '2000-02-28';
        $registrationStates = RegistrationState::select('id')->where('name', '=', 'Activo')->get();
        $applicant->registration_state_id = $registrationStates[0]["id"];
        $applicant->applicationDate = '2019-11-07';
        $origins = Origin::select('id')->where('name', '=', 'Escola Anterior - Feira das Profissões')->get();
        $applicant->origin_id = $origins[0]["id"];
        $unemployementSituations = UnemployementSituation::select('id')->where('name', '=', 'Empregado/a')->get();
        $applicant->unemployement_situation_id = $unemployementSituations[0]["id"];
        $educations = Education::select('id')->where('name', '=', '12º Ano incompleto')->get();
        $applicant->education_id = $educations[0]["id"];
        $applicant->phoneNumber = '978975123';
        $districts = District::select('id')->where('name', '=', 'Lisboa')->get();
        $applicant->district_id = $districts[0]["id"];
        $applicant->parish = 'Lisboa';
        $applicant->town = 'Lisboa';
        $applicant->email = 'br@m.pt';        
        $firstOptionCourses = CourseName::select('id')->where('name', '=', 'CIBERsegurança')->get();
        $applicant->first_option_course_id = $firstOptionCourses[0]["id"];
        $secondOptionCourses = CourseName::select('id')->where('name', '=', 'Mecatrónica Automóvel, Planeamento e Controlo de Processos')->get();
        if ($secondOptionCourses != "") {
            $applicant->second_option_course_id = $secondOptionCourses[0]["id"];
        }
        $rsClasses = RsClass::select('id')->where('course_name_id', '=', $applicant->first_option_course_id)->get();
        $applicant->rs_class_id = $rsClasses[0]["id"];
        $applicant->apt = false;
        $categories = Category::select('id')->where('name', '=', 'Candidatura Para R&S')->get();
        $applicant->category_id = $categories[0]["id"];
        $applicant->save();


    }
}