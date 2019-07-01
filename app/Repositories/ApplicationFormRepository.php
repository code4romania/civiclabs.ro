<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\ApplicationForm;

class ApplicationFormRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleRevisions;

    public function __construct(ApplicationForm $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        $this->updateBrowser($object, $fields, 'solutions');
        $this->updateBrowser($object, $fields, 'evaluators');
        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        if (!isset($fields['browsers'])) {
            $fields['browsers'] = [];
        }

        $fields['browsers']['solutions'] = $this->getFormFieldsForBrowser($object, 'solutions', 'solutions');
        $fields['browsers']['evaluators'] = $this->getFormFieldsForBrowser($object, 'evaluators', 'applications', 'name', 'dashboardUsers');

        return $fields;
    }
}
