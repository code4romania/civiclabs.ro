<?php

namespace App\Http\Controllers\Admin;

use A17\Twill\Http\Controllers\Admin\ModuleController;

class ApplicationFormController extends ModuleController
{
    protected $moduleName = 'applicationForms';

    protected $previewView = 'site.applications.form.show';

    protected $indexOptions = [
        'permalink'   => false,
    ];
}
