<?php

namespace App\Traits;

use App\Models\ApplicationSubmission;
use App\Models\ApplicationForm;
use App\Models\Partner;
use App\Models\Solution;
use App\Notifications\ResetPassword;

trait UserTrait
{

    public function __construct(array $attributes = [])
    {
        /**
         * Override twill-specific email templates causing email sending to fail.
         * Applying this override here doesn't change the default admin email templates.
         *
         * @link https://github.com/area17/twill/issues/32
         */
        config([
            'mail.markdown.paths' => [
                resource_path('views/vendor/mail')
            ]
        ]);

        parent::__construct($attributes);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    public function getMorphClass()
    {
        return 'dashboardUser';
    }

    public function applicationForms()
    {
        return $this->morphToMany(ApplicationForm::class, 'formable');
    }

    public function solutions()
    {
        return $this->morphedByMany(Solution::class, 'evaluable', null, 'user_id');
    }

    public function partners()
    {
        return $this->morphToMany(Partner::class, 'financeable');
    }

    /** Get the application submission of the user. */
    public function applicationSubmissions()
    {
        return $this->hasMany(ApplicationSubmission::class, 'dashboard_user_id')
            ->orderBy('created_at', 'desc');
    }

    public function getUserRoleDetailsAttribute()
    {
        switch ($this->user_role) {
            case 'financer':
                return $this->partners->first()->title ?? '-';
                break;

            case 'evaluator':
                return $this->solutions->pluck('title')->join(', ');
                break;
        }
    }

    public function getAuthorizedSolutionsAttribute()
    {
        if ('applicant' === $this->user_role) {
            return $this->applicationSubmissions;
        } else {
            $solutions = collect(null);
            switch ($this->user_role) {
                case 'financer':
                    if ($this->partners->count()) {
                        $solutions = $this->partners->first()->financesSolutions;
                    }
                    break;

                case 'evaluator':
                    $solutions = $this->solutions;
                    break;
            }

            return $solutions->whereIn('status', config('dashboard.show_solutions_with_status'));
        }
    }

    public function hasAccessToSolution(Solution $solution)
    {
        return $this->authorizedSolutions->contains('id', $solution->id);
    }
}
