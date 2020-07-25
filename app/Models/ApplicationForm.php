<?php

namespace App\Models;

use A17\Twill\Models\Behaviors\HasBlocks;
use A17\Twill\Models\Behaviors\HasRevisions;
use A17\Twill\Models\Behaviors\HasTranslation;
use A17\Twill\Models\Model;
use App\Models\ApplicationSubmission;
use App\Models\DashboardUser;
use App\Models\Solution;
use Carbon\Carbon;

class ApplicationForm extends Model
{
    use HasBlocks, HasTranslation, HasRevisions;

    protected $with = [
        'translations',
    ];

    protected $fillable = [
        'published',
        'title',
        'description',
        'submission_deadline',
        'evaluation_deadline',
        // 'position',
        // 'public',
        // 'featured',
        // 'publish_start_date',
        // 'publish_end_date',
    ];

    // uncomment and modify this as needed if you use the HasTranslation trait
    public $translatedAttributes = [
        'title',
        'description',
        'active',
    ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    public function solutions()
    {
        return $this->morphedByMany(Solution::class, 'formable');
    }

    public function evaluators()
    {
        return $this->morphedByMany(DashboardUser::class, 'formable')->where('user_role', 'evaluator');
    }

    public function submissions()
    {
        return $this->hasMany(ApplicationSubmission::class, 'form_id');
    }

    public function getSubmissionDeadlineTzAttribute()
    {
        return new Carbon($this->submission_deadline, config('app.display_timezone'));
    }

    public function getEvaluationDeadlineTzAttribute()
    {
        return new Carbon($this->evaluation_deadline, config('app.display_timezone'));
    }

    public function getAcceptsSubmissionsAttribute()
    {
        $now = Carbon::now()->tz(config('app.display_timezone'));

        return $now->lessThan($this->submission_deadline_tz);
    }

    public function getAcceptsEvaluationsAttribute()
    {
        $now = Carbon::now()->tz(config('app.display_timezone'));

        return $now->lessThan($this->evaluation_deadline_tz);
    }
}
