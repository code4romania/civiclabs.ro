<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePeopleSocialMediaColumnsLength extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->string('facebook', 100)->change();
            $table->string('twitter', 100)->change();
            $table->string('linkedin', 100)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('people', function (Blueprint $table) {
            $table->string('facebook', 30)->change();
            $table->string('twitter', 30)->change();
            $table->string('linkedin', 30)->change();
        });
    }
}
