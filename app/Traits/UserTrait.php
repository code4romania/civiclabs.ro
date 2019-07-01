<?php

namespace App\Traits;

use App\Models\ApplicationEvaluation;
use App\Models\ApplicationForm;
use App\Models\Partner;
use App\Models\Solution;

trait UserTrait {

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
        $solutions = collect(null);
        switch ($this->user_role) {
            case 'financer':
                $solutions = $this->partners->first()->financesSolutions;
                break;

            case 'evaluator':
                $solutions = $this->solutions;
                break;
        }

        return $solutions->whereIn('status', config('dashboard.show_solutions_with_status'));
    }

    public function hasAccessToSolution(Solution $solution)
    {
        return $this->authorizedSolutions->contains('id', $solution->id);
    }
}
