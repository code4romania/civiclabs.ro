<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationEvaluationsTables extends Migration
{
    public function up()
    {
        Schema::create('application_evaluations', function (Blueprint $table) {

            // this will create an id and timestamps columns
            createDefaultTableFields($table, true, false);

            $table->text('note')->nullable();
            $table->json('data')->nullable();

            $table->unsignedInteger('submission_id');
            $table->unsignedInteger('evaluator_id');

            $table->unique(['submission_id', 'evaluator_id']);

            $table->foreign('submission_id')->references('id')->on('application_submissions');
            $table->foreign('evaluator_id')->references('id')->on('dashboard_users');
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_evaluations');
    }
}
