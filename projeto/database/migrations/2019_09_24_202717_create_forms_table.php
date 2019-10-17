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
            $table->bigInteger('id_interview')->unsigned();
            $table->foreign('id_interview')->references('id')->on('interviews')->onDelete('cascade')->onUpdate('cascade');
            $table->string('interviewer')->default('id_user');
            $table->string('date');
            $table->string('applicantName')->default('id_applicant');
            $table->string('firstCourseOption')->nullable();
            $table->string('motivation')->nullable();
            $table->string('preferencesA')->nullable();
            $table->string('preferencesT')->nullable();
            $table->string('objectives')->nullable();
            $table->string('description')->nullable();
            $table->string('rules')->nullable();
            $table->string('family')->nullabe();
            $table->string('familyUnemployment')->nullable();
            $table->string('hobbies')->nullable();
            $table->string('reasons')->nullable();
            $table->string('presentation')->nullable();
            $table->string('posture')->nullable();
            $table->string('breakes')->nullable();
            $table->string('speech')->nullable();
            $table->string('understanding')->nullable();
            $table->string('comments')->nullable();
            $table->string('result')->nullable();
            $table->string('finalSay')->nullable();
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
