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
            $table->foreign('gender_id')->references('id')->on('gender')->onDelete('cascade')->onUpdate('cascade');
            $table->string('birthday');
            $table->bigInteger('registrationState_id')->unsigned();
            $table->foreign('registrationState_id')->references('id')->on('registrationState')->onDelete('cascade')->onUpdate('cascade');
            $table->string('applicationDate');
            $table->string('applicationYear');
            $table->string('source');
            $table->bigInteger('unemploymentSituation_id')->unsigned();
            $table->foreign('unemploymentSituation_id')->references('id')->on('unemploymentSituation')->onDelete('cascade')->onUpdate('cascade');
            $table->string('annulmentDate');
            $table->bigInteger('literacy_id')->unsigned();
            $table->foreign('literacy_id')->references('id')->on('literacy')->onDelete('cascade')->onUpdate('cascade');
            $table->string('previousSchool');
            $table->string('phoneNumber');
            $table->bigInteger('district_id')->unsigned();
            $table->foreign('district_id')->references('id')->on('district')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parish');
            $table->string('town');
            $table->string('email');
            $table->bigInteger('rsClass_id')->unsigned();
            $table->foreign('rsClass_id')->references('id')->on('rsClass')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
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
