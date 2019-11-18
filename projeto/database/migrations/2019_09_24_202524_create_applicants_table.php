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
            $table->bigInteger('gender_id')->unsigned()->nullable();
            $table->foreign('gender_id')->references('id')->on('genders')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('registration_state_id')->unsigned()->nullable();
            $table->foreign('registration_state_id')->references('id')->on('registration_states')->onDelete('cascade')->onUpdate('cascade');
            $table->date('applicationDate')->nullable();
            $table->bigInteger('origin_id')->unsigned()->nullable();
            $table->foreign('origin_id')->references('id')->on('origins')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('unemployement_situation_id')->unsigned()->nullable();
            $table->foreign('unemployement_situation_id')->references('id')->on('unemployement_situations')->onDelete('cascade')->onUpdate('cascade');
            $table->string('cancellationDate')->nullable();
            $table->bigInteger('cancellation_reason_id')->unsigned()->nullable();
            $table->foreign('cancellation_reason_id')->references('id')->on('cancellation_reasons');
            $table->bigInteger('education_id')->unsigned()->nullable();
            $table->foreign('education_id')->references('id')->on('education')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('provenance_school_id')->unsigned()->nullable();
            $table->foreign('provenance_school_id')->references('id')->on('provenance_schools');
            $table->string('birthtown')->nullable();
            $table->string('nationality')->nullable();
            $table->string('civilState')->nullable();
            $table->string('phoneNumber')->nullable();
            $table->string('address')->nullable();
            $table->bigInteger('district_id')->unsigned()->nullable();
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade')->onUpdate('cascade');
            $table->string('parish')->nullable();
            $table->string('town')->nullable();
            $table->string('email')->nullable();
            $table->bigInteger('first_option_course_id')->unsigned()->nullable();
            $table->foreign('first_option_course_id')->references('id')->on('course_names')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('second_option_course_id')->unsigned()->nullable();
            $table->foreign('second_option_course_id')->references('id')->on('course_names');
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
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');            
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
