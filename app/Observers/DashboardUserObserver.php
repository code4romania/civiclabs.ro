<?php

namespace App\Observers;

use App\Models\DashboardUser;
use App\Notifications\CreatedAccount;
use App\User;
use Illuminate\Support\Facades\Hash;

class DashboardUserObserver
{
    /**
     * Handle the dashboard user "created" event.
     *
     * @param  \App\DashboardUser  $dashboardUser
     * @return void
     */
    public function created(DashboardUser $dashboardUser)
    {
        $dashboardUser->password = Hash::make(str_random(64));
        $dashboardUser->save();
    }

    /**
     * Handle the dashboard user "updated" event.
     *
     * @param  \App\DashboardUser  $dashboardUser
     * @return void
     */
    public function updated(DashboardUser $dashboardUser)
    {
        $user = User::find($dashboardUser->id);

        if ($user->published && is_null($user->last_login_at)) {
            $user->notify(new CreatedAccount($user, app('auth.password.broker')->createToken($user)));
        }
    }

    /**
     * Handle the dashboard user "deleted" event.
     *
     * @param  \App\DashboardUser  $dashboardUser
     * @return void
     */
    public function deleted(DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Handle the dashboard user "restored" event.
     *
     * @param  \App\DashboardUser  $dashboardUser
     * @return void
     */
    public function restored(DashboardUser $dashboardUser)
    {
        //
    }

    /**
     * Handle the dashboard user "force deleted" event.
     *
     * @param  \App\DashboardUser  $dashboardUser
     * @return void
     */
    public function forceDeleted(DashboardUser $dashboardUser)
    {
        //
    }
}
