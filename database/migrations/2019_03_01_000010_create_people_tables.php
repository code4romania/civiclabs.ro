<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePeopleTables extends Migration
{
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {

            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->string('name', 200);
            $table->string('facebook', 30)->nullable();
            $table->string('twitter', 30)->nullable();
            $table->string('linkedin', 30)->nullable();

            // use this column with the HasPosition trait
            $table->integer('position')->unsigned()->nullable();
        });

        Schema::create('person_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'person');
            // add some translated fields
            $table->string('title', 200)->nullable();
            $table->string('fields', 200)->nullable();
            $table->text('bio')->nullable();
        });

        Schema::create('person_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'person');
        });

        // related content table, holds many to many association between 2 tables
        Schema::create('personables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('personable_id')->nullable()->unsigned();
            $table->string('personable_type')->nullable();
            $table->integer('person_id')->unsigned();
            $table->foreign('person_id', 'fk_personables_person_id')->references('id')->on('people')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['personable_type', 'personable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('personables');
        Schema::dropIfExists('person_translations');
        Schema::dropIfExists('person_slugs');
        Schema::dropIfExists('people');
    }
}
