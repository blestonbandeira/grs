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
            $table->bigInteger('course_name_id')->unsigned()->nullable();
            $table->foreign('course_name_id')->references('id')->on('course_names')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('course_type_id')->unsigned()->nullable();
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('regime_id')->unsigned()->nullable();
            $table->foreign('regime_id')->references('id')->on('regimes')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('minimum_qualification_id')->unsigned()->nullable();
            $table->foreign('minimum_qualification_id')->references('id')->on('minimum_qualifications')->onDelete('cascade')->onUpdate('cascade');
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
