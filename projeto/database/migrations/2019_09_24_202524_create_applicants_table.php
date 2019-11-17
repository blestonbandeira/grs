<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicants', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->date('birthdate')->nullable();
            $table->string('nif')->nullable();
            $table->string('identityCard')->nullable();
            $table->date('ccExpirationDate')->nullable();
            $table->bigInteger('id_gender')->unsigned()->nullable();
            $table->foreign('id_gender')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_registrationState')->unsigned()->nullable();
            $table->foreign('id_registrationState')->references('id')->on('registration_states')->onDelete('cascade')->onUpdate('cascade');
            $table->date('applicationDate')->nullable();
            $table->bigInteger('id_origin')->unsigned()->nullable();
            $table->foreign('id_origin')->references('id')->on('origins')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_unemployementSituation')->unsigned()->nullable();
            $table->foreign('id_unemployementSituation')->references('id')->on('unemployement_situations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cancellationDate')->nullable();
            $table->bigInteger('id_cancellation_reason')->unsigned()->nullable();
            $table->foreign('id_cancellation_reason')->references('id')->on('cancellation_reasons');
            $table->bigInteger('id_education')->unsigned()->nullable();
            $table->foreign('id_education')->references('id')->on('education')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_provenance_school')->unsigned()->nullable();
            $table->foreign('id_provenance_school')->references('id')->on('provenance_schools');
            $table->string('birthtown')->nullable();
            $table->string('nationality')->nullable();
            $table->string('civilState')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('id_district')->unsigned()->nullable();
            $table->foreign('id_district')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parish')->nullable();
            $table->string('town')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('id_firstOptionCourse')->unsigned()->nullable();
            $table->foreign('id_firstOptionCourse')->references('id')->on('course_names')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_secondOptionCourse')->unsigned()->nullable();
            $table->foreign('id_secondOptionCourse')->references('id')->on('course_names');
            $table->bigInteger('rs_class_id')->unsigned()->nullable();
            $table->foreign('rs_class_id')->references('id')->on('rs_classes')->onDelete('cascade')->onUpdate('cascade');            
            $table->string('appFormUrl')->nullable();
            $table->string('ccUrl')->nullable();
            $table->string('diplomaUrl')->nullable();
            $table->string('unemployementUrl')->nullable();
            $table->string('curriculumUrl')->nullable();
            $table->string('criminalRecord')->nullable();
            $table->string('medicalRecordUrl')->nullable();
            $table->string('dataAssessmentUrl')->nullable();
            $table->boolean('apt')->default(false);
            $table->bigInteger('id_category')->unsigned()->nullable();
            $table->foreign('id_category')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');            
            $table->string('observations')->nullable();
            $table->boolean('alternate')->nullable()->default(false);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
}
