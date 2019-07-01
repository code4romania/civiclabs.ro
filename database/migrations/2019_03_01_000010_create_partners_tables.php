<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePartnersTables extends Migration
{
    public function up()
    {
        Schema::create('partners', function (Blueprint $table) {

            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->string('title', 200)->nullable();
            $table->string('website', 100)->nullable();

            $table->boolean('featured')->default(false);
            // use this column with the HasPosition trait
            $table->integer('position')->unsigned()->nullable();
        });

        // related content table, holds many to many association between 2 tables
        Schema::create('financeables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('financeable_id')->nullable()->unsigned();
            $table->string('financeable_type')->nullable();
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id', 'fk_financeables_partner_id')->references('id')->on('partners')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['financeable_type', 'financeable_id']);
        });

        Schema::create('implementables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('implementable_id')->nullable()->unsigned();
            $table->string('implementable_type')->nullable();
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id', 'fk_implementables_partner_id')->references('id')->on('partners')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['implementable_type', 'implementable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('financeables');
        Schema::dropIfExists('implementables');
        Schema::dropIfExists('partners');
    }
}
