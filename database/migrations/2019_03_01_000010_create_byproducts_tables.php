<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateByproductsTables extends Migration
{
    public function up()
    {
        Schema::create('byproducts', function (Blueprint $table) {

            // this will create an id, a "published" column, and soft delete and timestamps columns
            createDefaultTableFields($table);

            $table->boolean('standalone_page')->default(false);
            $table->string('background_color', 7)->nullable();
            $table->string('text_color', 7)->nullable();
            // add those 2 colums to enable publication timeframe fields (you can use publish_start_date only if you don't need to provide the ability to specify an end date)
            // $table->timestamp('publish_start_date')->nullable();
            // $table->timestamp('publish_end_date')->nullable();

            // use this column with the HasPosition trait
            $table->integer('position')->unsigned()->nullable();
        });

        // remove this if you're not going to use any translated field, ie. using the HasTranslation trait. If you do use it, create fields you want translatable in this table instead of the main table above. You do not need to create fields in both tables.
        Schema::create('byproduct_translations', function (Blueprint $table) {
            createDefaultTranslationsTableFields($table, 'byproduct');
            // add some translated fields
            $table->string('title', 200)->nullable();
            $table->text('description')->nullable();
        });

        // // remove this if you're not going to use slugs, ie. using the HasSlug trait
        Schema::create('byproduct_slugs', function (Blueprint $table) {
            createDefaultSlugsTableFields($table, 'byproduct');
        });

        // remove this if you're not going to use revisions, ie. using the HasRevisions trait
        Schema::create('byproduct_revisions', function (Blueprint $table) {
            createDefaultRevisionsTableFields($table, 'byproduct');
        });
    }

    public function down()
    {
        Schema::dropIfExists('byproduct_revisions');
        Schema::dropIfExists('byproduct_translations');
        Schema::dropIfExists('byproduct_slugs');
        Schema::dropIfExists('byproducts');
    }
}
