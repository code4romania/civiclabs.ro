<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\ApplicationSubmission;

class ApplicationSubmissionRepository extends ModuleRepository
{
    

    public function __construct(ApplicationSubmission $model)
    {
        $this->model = $model;
    }
}
