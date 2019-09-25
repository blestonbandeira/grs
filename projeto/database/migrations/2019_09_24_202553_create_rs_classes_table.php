<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRsClassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rs_classes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('formationAssistant_id')->unsigned();
            $table->foreign('formationAssistant_id')->references('id')->on('formation_assistants')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('classState_id')->unsigned();
            $table->foreign('classState_id')->references('id')->on('class_states')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('rs_classes');
    }
}
