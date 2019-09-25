<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEnterviewInterviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enterview_interviewers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('interview_id')->unsigned();
            $table->foreign('interview_id')->references('id')->on('interviews')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('interviewer_id')->unsigned();
            $table->foreign('interviewer_id')->references('id')->on('interviewers')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('enterview_interviewers');
    }
}
