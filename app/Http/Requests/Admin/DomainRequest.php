<?php

namespace App\Http\Requests\Admin;

use A17\Twill\Http\Requests\Admin\Request;

class DomainRequest extends Request
{
    public function rulesForCreate()
    {
        return [
            'research_percentage' => 'nullable|numeric|lte:100',
            'prototyping_percentage' => 'nullable|numeric|lte:100'
        ];
    }

    public function rulesForUpdate()
    {
        return [
            'research_percentage' => 'nullable|numeric|lte:100',
            'prototyping_percentage' => 'nullable|numeric|lte:100'
        ];
    }
}
