<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UpdatePartnersTables extends Migration
{
    public function up()
    {
        Schema::create('developables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('developable_id')->nullable()->unsigned();
            $table->string('developable_type')->nullable();
            $table->integer('partner_id')->unsigned();
            $table->foreign('partner_id', 'fk_developables_partner_id')->references('id')->on('partners')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['developable_type', 'developable_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('developables');
    }
}
