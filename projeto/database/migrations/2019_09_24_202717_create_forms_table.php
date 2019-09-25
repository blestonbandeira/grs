<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFormsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('forms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('interview_id')->unsigned();
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade')->onUpdate('cascade');
            $table->string('interviewerName');
            $table->string('date');
            $table->string('applicantName');
            $table->string('firstCourseOption');
            $table->string('motivation');
            $table->string('preferencesA');
            $table->string('preferencesT');
            $table->string('objectives');
            $table->string('description');
            $table->string('rules');
            $table->string('family');
            $table->string('familyUnemployment');
            $table->string('hobbies');
            $table->string('reasons');
            $table->string('presentation');
            $table->string('posture');
            $table->string('breakes');
            $table->string('speech');
            $table->string('understanding');
            $table->string('comments');
            $table->string('result');
            $table->string('finalOpinion');
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
        Schema::dropIfExists('forms');
    }
}
