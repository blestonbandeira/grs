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
            $table->string('nif')->nullable();
            $table->bigInteger('id_gender')->unsigned()->nullable();
            $table->foreign('id_gender')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->date('birthdate')->nullable();
            $table->bigInteger('id_registrationState')->unsigned()->nullable();
            $table->foreign('id_registrationState')->references('id')->on('registration_states')->onDelete('cascade')->onUpdate('cascade');
            $table->date('applicationDate')->nullable();
            $table->bigInteger('id_origin')->unsigned()->nullable();
            $table->foreign('id_origin')->references('id')->on('origins')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_unemploymentSituation')->unsigned()->nullable();
            $table->foreign('id_unemploymentSituation')->references('id')->on('unemployment_situations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cancellationDate')->nullable();
            $table->string('cancellationReason')->nullable();
            $table->bigInteger('id_education')->unsigned()->nullable();
            $table->foreign('id_education')->references('id')->on('education')->onDelete('cascade')->onUpdate('cascade');
            $table->string('previousSchool')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->bigInteger('id_district')->unsigned()->nullable();
            $table->foreign('id_district')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parish')->nullable();
            $table->string('town')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('firstOptionCourse')->unsigned()->nullable()->unique();
            $table->foreign('firstOptionCourse')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('secondOptionCourse')->unsigned()->nullable()->unique();
            $table->foreign('secondOptionCourse')->references('id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_rsClass')->unsigned()->nullable();
            $table->foreign('id_rsClass')->references('id')->on('rs_classes')->onDelete('cascade')->onUpdate('cascade');            
            $table->string('appFormUrl')->nullable();
            $table->string('ccUrl')->nullable();
            $table->string('literacyUrl')->nullable();
            $table->string('unemploymentUrl')->nullable();
            $table->string('curriculumUrl')->nullable();
            $table->string('criminalRecord')->nullable();
            $table->string('medicalRecordUrl')->nullable();
            $table->string('dataAssessmentUrl')->nullable();
            $table->boolean('apt')->default(false);
            $table->bigInteger('id_category')->unsigned()->nullable()->unique();
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
