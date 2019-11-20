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
            $table->string('date');
            $table->bigInteger('test_type_id')->unsigned()->nullable();
            $table->foreign('test_type_id')->references('id')->on('test_types')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('atendance')->default(0);
            $table->bigInteger('applicant_id')->unsigned()->nullable();
            $table->foreign('applicant_id')->references('id')->on('applicants')->onDelete('cascade')->onUpdate('cascade');            
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
