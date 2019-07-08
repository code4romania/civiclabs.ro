<?php

namespace App\Models;

use A17\Twill\Models\Model;
use App\Models\ApplicationSubmission;
use App\Models\DashboardUser;

class ApplicationEvaluation extends Model
{
    protected $casts = [
        'data' => 'array',
    ];

    protected $fillable = [
        'note',
        'data',
        'submission_id',
        'evaluator_id',
    ];

    public function submission()
    {
        return $this->belongsTo(ApplicationSubmission::class);
    }

    public function solution()
    {
        return $this->submission->solution();
    }

    public function evaluator()
    {
        return $this->belongsTo(DashboardUser::class);
    }

    public function getSolutionIdAttribute()
    {
        return $this->solution->id;
    }

    public function getEvaluationAuthorAttribute()
    {
        return $this->evaluator->name;
    }

    public function getEvaluationCreatedDateAttribute()
    {
        return $this->created_at->toDateTimeString();
    }

    public function getEvaluationUpdatedDateAttribute()
    {
        return $this->updated_at->toDateTimeString();
    }
}
