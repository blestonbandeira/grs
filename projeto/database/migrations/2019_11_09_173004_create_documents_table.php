<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('size');
            $table->bigInteger('id_applicant')->unsigned()->nullable();
            $table->foreign('id_applicant')->references('id')->on('applicants');
            $table->bigInteger('id_document_type')->unsigned()->nullable();
            $table->foreign('id_document_type')->references('id')->on('document_types');
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
        Schema::dropIfExists('documents');
    }
}
