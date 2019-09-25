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
            $table->string('name');
            $table->bigInteger('gender_id')->unsigned();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->string('birthday');
            $table->bigInteger('registrationState_id')->unsigned();
            $table->foreign('registrationState_id')->references('id')->on('registration_states')->onDelete('cascade')->onUpdate('cascade');
            $table->string('applicationDate');
            $table->string('applicationYear');
            $table->string('source');
            $table->bigInteger('unemploymentSituation_id')->unsigned();
            $table->foreign('unemploymentSituation_id')->references('id')->on('unemployment_situations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('annulmentDate');
            $table->bigInteger('education_id')->unsigned();
            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade')->onUpdate('cascade');
            $table->string('previousSchool');
            $table->string('phoneNumber');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parish');
            $table->string('town');
            $table->string('email');
            $table->bigInteger('rsClass_id')->unsigned();
            $table->foreign('rsClass_id')->references('id')->on('rs_classes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('appFormUrl');
            $table->string('ccUrl');
            $table->string('literacyUrl');
            $table->string('unemploymentUrl');
            $table->string('curriculumUrl');
            $table->string('criminalRecord');
            $table->string('am');
            $table->string('apt');
            $table->string('categorization');
            $table->string('dataAssessment');
            $table->string('observations');
            $table->boolean('alternate');
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
