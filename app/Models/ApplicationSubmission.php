<?php

namespace App\Models;

use A17\Twill\Models\Model;
use App\Models\ApplicationEvaluation;
use App\Models\ApplicationForm;
use App\Models\Solution;

class ApplicationSubmission extends Model
{
    protected $casts = [
        'data' => 'array',
    ];

    protected $fillable = [
        'title',
        'uuid',
        'data',
        'solutions',
        'dashboard_user_id',
        'status',
    ];

    // add checkbox fields names here (published toggle is itself a checkbox)
    public $checkboxes = [
        'published'
    ];

    public function getSubmissionDateAttribute()
    {
        return $this->created_at
            ->timezone(config('app.display_timezone'))
            ->toDateTimeString();
    }

    public function getSolutionNameAttribute()
    {
        return $this->solution->title;
    }

    public function getFormNameAttribute()
    {
        return $this->form->title;
    }

    public function form()
    {
        return $this->belongsTo(ApplicationForm::class);
    }

    public function solution()
    {
        return $this->belongsTo(Solution::class);
    }

    public function evaluations()
    {
        return $this->hasMany(ApplicationEvaluation::class, 'submission_id');
    }
}
