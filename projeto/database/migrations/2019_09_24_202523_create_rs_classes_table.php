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
            $table->string('name')->nullable();
            $table->bigInteger('id_user')->unsigned()->nullable(); //fazer where para atribuir id de assistente de formação
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_classState')->unsigned()->nullable();
            $table->foreign('id_classState')->references('id')->on('class_states')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('id_course')->unsigned()->nullable();
            $table->foreign('id_course')->references('id')->on('courses');
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
