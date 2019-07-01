<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\ApplicationEvaluation;

class ApplicationEvaluationRepository extends ModuleRepository
{
    

    public function __construct(ApplicationEvaluation $model)
    {
        $this->model = $model;
    }
}
