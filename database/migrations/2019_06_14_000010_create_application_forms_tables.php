<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApplicationFormsTables extends Migration
{
    public function up()
    {
        Schema::create('application_forms', function (Blueprint $table) {

            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);
            $table->timestamp('submission_deadline')->nullable();
            $table->timestamp('evaluation_deadline')->nullable();
        });

        // remove this if you're not going to use any translated field, ie. using the HasTranslation trait. If you do use it, create fields you want translatable in this table instead of the main table above. You do not need to create fields in both tables.
        Schema::create('application_form_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'application_form');
            // add some translated fields
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        // remove this if you're not going to use revisions, ie. using the HasRevisions trait
        Schema::create('application_form_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'application_form');
        });


        // related content table, holds many to many association between 2 tables
        Schema::create('formables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('formable_id')->nullable()->unsigned();
            $table->string('formable_type')->nullable();
            $table->integer('application_form_id')->unsigned();
            $table->foreign('application_form_id', 'fk_formables_application_form_id')->references('id')->on('application_forms')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['formable_type', 'formable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('formables');
        Schema::dropIfExists('application_form_revisions');
        Schema::dropIfExists('application_form_translations');
        Schema::dropIfExists('application_forms');
    }
}
