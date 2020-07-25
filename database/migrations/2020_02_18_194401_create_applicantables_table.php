<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicantables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('applicantable_id')->nullable()->unsigned();
            $table->string('applicantable_type')->nullable();
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id', 'fk_applicantables_partner_id')->references('id')->on('partners')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['applicantable_type', 'applicantable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicantables');
    }
}
