<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInterviewInterviewerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interview_interviewer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_interview')->unsigned();
            $table->foreign('id_interview')->references('id')->on('interviews')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_user')->unsigned(); //fazer where para garantir que o user tem id de interviewer
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('enterview_interviewer');
    }
}
