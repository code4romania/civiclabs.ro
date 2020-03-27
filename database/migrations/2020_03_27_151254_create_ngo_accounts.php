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
        Schema::table('application_submissions', function (Blueprint $table) {
            $table->integer('dashboard_user_id')->unsigned()->nullable();
            $table->foreign('dashboard_user_id')->references('id')->on('dashboard_users')->onDelete('cascade');

            $table->unique(['solution_id', 'dashboard_user_id']);
        });

        DB::statement("ALTER TABLE dashboard_users CHANGE COLUMN user_role user_role ENUM('financer', 'evaluator', 'applicant')");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('application_submissions', function (Blueprint $table) {
            $table->dropForeign('application_submissions_dashboard_user_id_foreign');
            $table->dropIndex('application_submissions_solution_id_dashboard_user_id_unique');
            $table->dropColumn('dashboard_user_id');
        });

        /** Delete all applicant accounts. */
        DashboardUser::where('user_role', 'applicant')->delete();

        DB::statement("ALTER TABLE dashboard_users CHANGE COLUMN user_role user_role ENUM('financer', 'evaluator')");
    }
}
