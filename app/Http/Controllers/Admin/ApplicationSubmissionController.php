<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;
use App\Repositories\SolutionRepository;

class ApplicationSubmissionController extends ModuleController
{
    protected $moduleName = 'applicationSubmissions';

    protected $indexOptions = [
        'create'    => false,
        'permalink' => false,
        'publish'   => false,
        'delete'    => false,
    ];

    protected $indexColumns = [
        'title' => [
            'title' => 'Title',
            'field' => 'title',
            'sort' => true,
        ],
        'solution' => [
            'title' => 'Solution',
            'relationship' => 'solution',
            'field' => 'title',
            'sort' => false,
        ],
        'date' => [
            'title' => 'Submission date',
            'field' => 'submission_date',
            'sort' => false,
        ],
    ];

    protected $filters = [
        'solution' => 'solution_id',
    ];

    protected function indexData($request)
    {
        return [
            'solutionList' => app(SolutionRepository::class)->listAll(),
        ];
    }
}
