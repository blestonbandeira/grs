<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('startDate')->nullable();
            $table->bigInteger('id_courseName')->unsigned()->nullable();
            $table->foreign('id_courseName')->references('id')->on('course_names');
            $table->bigInteger('id_courseType')->unsigned()->nullable();
            $table->foreign('id_courseType')->references('id')->on('course_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_regime')->unsigned()->nullable();
            $table->foreign('id_regime')->references('id')->on('regimes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_minimumQualification')->unsigned()->nullable();
            $table->foreign('id_minimumQualification')->references('id')->on('minimum_qualifications')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('courses');
    }
}
