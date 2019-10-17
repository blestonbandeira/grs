<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('test_course', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_testType')->unsigned();
            $table->foreign('id_testType')->references('id')->on('test_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_courseType')->unsigned();
            $table->foreign('id_courseType')->references('id')->on('course_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('test_course');
    }
}
