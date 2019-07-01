<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDomainsTables extends Migration
{
    public function up()
    {
        Schema::create('domains', function (Blueprint $table) {

            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            // add those 2 colums to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();

            // use this column with the HasPosition trait
            $table->integer('position')->unsigned()->nullable();
        });

        // remove this if you're not going to use any translated field, ie. using the HasTranslation trait. If you do use it, create fields you want translatable in this table instead of the main table above. You do not need to create fields in both tables.
        Schema::create('domain_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'domain');
            // add some translated fields
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        // remove this if you're not going to use slugs, ie. using the HasSlug trait
        Schema::create('domain_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'domain');
        });

        // remove this if you're not going to use revisions, ie. using the HasRevisions trait
        Schema::create('domain_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'domain');
        });

        // related content table, holds many to many association between 2 tables
        Schema::create('domainables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('domainable_id')->nullable()->unsigned();
            $table->string('domainable_type')->nullable();
            $table->integer('domain_id')->unsigned();
            $table->foreign('domain_id', 'fk_domainables_domain_id')->references('id')->on('domains')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['domainable_type', 'domainable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('domainables');
        Schema::dropIfExists('domain_revisions');
        Schema::dropIfExists('domain_translations');
        Schema::dropIfExists('domain_slugs');
        Schema::dropIfExists('domains');
    }
}
