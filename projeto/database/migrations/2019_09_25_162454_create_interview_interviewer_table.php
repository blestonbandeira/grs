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
            $table->bigInteger('interview_id')->unsigned();
            $table->foreign('interview_id')->references('id')->on('interviews');
            $table->bigInteger('user_id')->unsigned(); //fazer where para garantir que o user tem id de interviewer
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('interview_interviewer');
    }
}
