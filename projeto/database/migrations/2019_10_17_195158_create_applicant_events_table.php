<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant_events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_applicant')->unsigned()->nullable();
            $table->foreign('id_applicant')->references('id')->on('applicants');
            $table->bigInteger('id_event')->unsigned()->nullable();
            $table->foreign('id_event')->references('id')->on('events');
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
        Schema::dropIfExists('applicant_events');
    }
}
