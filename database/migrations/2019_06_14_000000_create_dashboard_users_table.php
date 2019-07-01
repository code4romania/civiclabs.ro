<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDashboardUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dashboard_users', function (Blueprint $table) {
            createDefaultTableFields($table);

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->rememberToken();

            $table->enum('user_role', ['financer', 'evaluator']);
            $table->unsignedInteger('partner_id')->nullable();

            $table->foreign('partner_id')->references('id')->on('partners')->onDelete('cascade');
        });

        Schema::create('dashboard_users_password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        // related content table, holds many to many association between 2 tables
        Schema::create('evaluables', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('position')->unsigned()->nullable();
            $table->integer('evaluable_id')->nullable()->unsigned();
            $table->string('evaluable_type')->nullable();
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id', 'fk_evaluables_user_id')->references('id')->on('dashboard_users')->onDelete('cascade')->onUpdate('cascade');
            $table->index(['evaluable_type', 'evaluable_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('evaluables');
        Schema::dropIfExists('dashboard_users');
        Schema::dropIfExists('dashboard_users_password_resets');
    }
}
