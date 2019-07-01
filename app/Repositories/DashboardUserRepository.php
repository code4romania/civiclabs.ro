<?php

namespace App\Repositories;


use A17\Twill\Repositories\ModuleRepository;
use App\Models\DashboardUser;

class DashboardUserRepository extends ModuleRepository
{


    public function __construct(DashboardUser $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        $this->updateBrowser($object, $fields, 'solutions');
        $this->updateBrowser($object, $fields, 'partners');
        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        if (!isset($fields['browsers'])) {
            $fields['browsers'] = [];
        }

        $fields['browsers']['partners'] = $this->getFormFieldsForBrowser($object, 'partners', null, 'title', 'partners');
        $fields['browsers']['solutions'] = $this->getFormFieldsForBrowser($object, 'solutions', 'solutions');

        return $fields;
    }
}
