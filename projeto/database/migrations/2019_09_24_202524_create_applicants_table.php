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
            $table->bigInteger('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('birthday')->nullable();
            $table->bigInteger('registrationState_id')->unsigned()->nullable();
            $table->foreign('registrationState_id')->references('id')->on('registration_states')->onDelete('cascade')->onUpdate('cascade');
            $table->string('applicationDate')->nullable();
            $table->string('applicationYear')->nullable();
            $table->string('source')->nullable();
            $table->bigInteger('unemploymentSituation_id')->unsigned()->nullable();
            $table->foreign('unemploymentSituation_id')->references('id')->on('unemployment_situations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('annulmentDate')->nullable();
            $table->bigInteger('education_id')->unsigned()->nullable();
            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade')->onUpdate('cascade');
            $table->string('previousSchool')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parish')->nullable();
            $table->string('town')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('rsClass_id')->unsigned()->nullable();
            $table->foreign('rsClass_id')->references('id')->on('rs_classes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('appFormUrl')->nullable();
            $table->string('ccUrl')->nullable();
            $table->string('literacyUrl')->nullable();
            $table->string('unemploymentUrl')->nullable();
            $table->string('curriculumUrl')->nullable();
            $table->string('criminalRecord')->nullable();
            $table->string('am')->nullable();
            $table->string('apt')->nullable();
            $table->string('categorization')->nullable();
            $table->string('dataAssessment')->nullable();
            $table->string('observations')->nullable();
            $table->boolean('alternate')->nullable();
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
