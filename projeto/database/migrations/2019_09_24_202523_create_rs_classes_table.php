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
            $table->date('startDate')->nullable();                       
            $table->bigInteger('user_id')->unsigned()->nullable(); //fazer where para atribuir id de assistente de formação
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->bigInteger('class_state_id')->unsigned()->default(1);
            $table->foreign('class_state_id')->references('id')->on('class_states')->onDelete('cascade')->onUpdate('cascade');           
            $table->bigInteger('course_name_id')->unsigned()->nullable();
            $table->foreign('course_name_id')->references('id')->on('course_names');
            $table->string('name')->nullable();
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
