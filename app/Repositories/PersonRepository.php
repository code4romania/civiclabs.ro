<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Person;

class PersonRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias;

    public function __construct(Person $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        $this->updateBrowser($object, $fields, 'domains');
        $this->updateBrowser($object, $fields, 'solutions');
        $this->updateBrowser($object, $fields, 'byproducts');
        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        if (!isset($fields['browsers'])) {
            $fields['browsers'] = [];
        }

        $fields['browsers']['domains'] = $this->getFormFieldsForBrowser(
            $object,
            'domains',
            'solutions'
        );

        $fields['browsers']['solutions'] = $this->getFormFieldsForBrowser(
            $object,
            'solutions',
            'solutions'
        );

        $fields['browsers']['byproducts'] = $this->getFormFieldsForBrowser(
            $object,
            'byproducts',
            'solutions'
        );

        return $fields;
    }
}
