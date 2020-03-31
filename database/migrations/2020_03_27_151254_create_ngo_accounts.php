<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\DashboardUser;

class CreateNgoAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** Add 'applicant' as a user_role type. */
        DB::statement("ALTER TABLE dashboard_users CHANGE COLUMN user_role user_role ENUM('financer', 'evaluator', 'applicant')");

        /** Link 'application_submissions' table to 'dashboard_users' table. */
        Schema::table('application_submissions', function (Blueprint $table) {
            $table->integer('dashboard_user_id')->unsigned()->nullable();
            $table->foreign('dashboard_user_id')->references('id')->on('dashboard_users')->onDelete('cascade');

            $table->enum('status', ['received', 'evaluation', 'rejected'])->nullable();

            $table->unique(['solution_id', 'dashboard_user_id']);
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
        Schema::table('application_submissions', function (Blueprint $table) {
            $table->dropIndex('application_submissions_solution_id_dashboard_user_id_unique');

            $table->dropColumn('status');

            $table->dropForeign('application_submissions_dashboard_user_id_foreign');
            $table->dropColumn('dashboard_user_id');
        });

        /** Delete all applicant accounts. */
        DB::statement("DELETE FROM `dashboard_users` WHERE user_role='applicant'");
        /** Remove 'applicant' as a user_role type. */
        DB::statement("ALTER TABLE dashboard_users CHANGE COLUMN user_role user_role ENUM('financer', 'evaluator')");
    }
}
