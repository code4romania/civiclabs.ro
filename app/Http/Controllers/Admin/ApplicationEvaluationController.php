<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\ApplicationSubmissionRepository;
use App\Repositories\DashboardUserRepository;
use App\Repositories\SolutionRepository;

class ApplicationEvaluationController extends ModuleController
{
    protected $moduleName = 'applicationEvaluations';

    protected $indexOptions = [
        'create'    => false,
        'permalink' => false,
        'publish'   => false,
        'delete'    => false,
        'restore'   => false,
    ];

    protected $titleColumnKey = 'id';
    protected $titleFormKey = 'id';

    protected $indexColumns = [
        'id'        => [
            'title'        => 'Evaluation ID',
            'field'        => 'id',
            'sort'         => true,
        ],
        'evaluator' => [
            'title'        => 'Evaluator',
            'relationship' => 'evaluator',
            'field'        => 'name',
            'sort'         => false,
        ],
        'submission' => [
            'title'        => 'Submission',
            'relationship' => 'submission',
            'field'        => 'title',
            'sort'         => false,
        ],
        'solution' => [
            'title'        => 'Solution',
            'relationship' => 'solution',
            'field'        => 'title',
            'sort'         => false,
        ],
    ];

    protected $filters = [
        'evaluator'  => 'evaluator_id',
        'submission' => 'submission_id',
        'solution'   => 'solution_id',
    ];

    protected function indexData($request)
    {
        return [
            'evaluatorList'  => app(DashboardUserRepository::class)->listAll('name'),
            'submissionList' => app(ApplicationSubmissionRepository::class)->listAll('title'),
            'solutionList'   => app(SolutionRepository::class)->listAll('title'),
        ];
    }
}
