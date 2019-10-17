<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->bigInteger('id_testType')->unsigned()->nullable();
            $table->foreign('id_testType')->references('id')->on('test_types')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_applicant')->unsigned()->nullable();
            $table->foreign('id_applicant')->references('id')->on('applicants')->onDelete('cascade')->onUpdate('cascade');            
            $table->string('result');
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
        Schema::dropIfExists('tests');
    }
}
