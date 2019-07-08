<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Partner;

class PartnerRepository extends ModuleRepository
{
    use HandleMedias;

    public function __construct(Partner $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        $this->updateBrowser($object, $fields, 'financesDomains');
        $this->updateBrowser($object, $fields, 'financesSolutions');
        $this->updateBrowser($object, $fields, 'implementsSolutions');
        $this->updateBrowser($object, $fields, 'developsSolutions');
        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        if (!isset($fields['browsers'])) {
            $fields['browsers'] = [];
        }

        $fields['browsers']['financesDomains'] = $this->getFormFieldsForBrowser(
            $object,
            'financesDomains',
            'solutions',
            'title',
            'domains'
        );

        $fields['browsers']['financesSolutions'] = $this->getFormFieldsForBrowser(
            $object,
            'financesSolutions',
            'solutions',
            'title',
            'solutions'
        );

        $fields['browsers']['implementsSolutions'] = $this->getFormFieldsForBrowser(
            $object,
            'implementsSolutions',
            'solutions',
            'title',
            'solutions'
        );

        $fields['browsers']['developsSolutions'] = $this->getFormFieldsForBrowser(
            $object,
            'developsSolutions',
            'solutions',
            'title',
            'solutions'
        );

        return $fields;
    }
}
