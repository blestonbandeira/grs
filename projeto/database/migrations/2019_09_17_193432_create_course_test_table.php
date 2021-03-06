<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_test', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('test_type_id')->unsigned();
            $table->foreign('test_type_id')->references('id')->on('test_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('course_type_id')->unsigned();
            $table->foreign('course_type_id')->references('id')->on('course_types')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('course_test');
    }
}
