<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusColumnsToDomainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Link 'application_submissions' table to 'dashboard_users' table. */
        Schema::table('domains', function (Blueprint $table) {
            $table->integer('research_percentage')->unsigned()->nullable();
            $table->integer('prototyping_percentage')->unsigned()->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        /** Remove link between 'application_submissions' table and 'dashboard_users' table. */
        Schema::table('domains', function (Blueprint $table) {
            $table->dropColumn('prototyping_percentage')->unsigned()->nullable();
            $table->dropColumn('research_percentage')->unsigned()->nullable();
        });
    }
}
