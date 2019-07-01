<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationSubmissionsTables extends Migration
{
    public function up()
    {
        Schema::create('application_submissions', function (Blueprint $table) {

            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table, true, false);

            $table->uuid('uuid')->nullable();

            // feel free to modify the name of this column, but title is supported by default (you would need to specify the name of the column Twill should consider as your "title" column in your module controller if you change it)
            $table->string('title', 200)->nullable();

            $table->json('data')->nullable();

            $table->unsignedInteger('form_id');
            $table->unsignedInteger('solution_id');

            $table->foreign('form_id')->references('id')->on('application_forms')->onDelete('cascade');
            $table->foreign('solution_id')->references('id')->on('solutions')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_submissions');
    }
}
