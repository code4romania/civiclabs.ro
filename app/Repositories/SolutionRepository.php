<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Solution;

class SolutionRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions;

    public function __construct(Solution $model)
    {
        $this->model = $model;
    }


    public function prepareFieldsBeforeSave($object, $fields)
    {
        $fields = parent::prepareFieldsBeforeSave($object, $fields);

        $fields['repositories'] = [];

        for ($i=0; $i < 5; $i++) {
            if (isset($fields["repository_{$i}"])) {
                $fields['repositories'][] = $fields["repository_{$i}"];
                unset($fields["repository_{$i}"]);
            }
        }

        return $fields;
    }

    public function afterSave($object, $fields)
    {
        $this->updateBrowser($object, $fields, 'financers');
        $this->updateBrowser($object, $fields, 'developers');
        $this->updateBrowser($object, $fields, 'implementers');
        $this->updateBrowser($object, $fields, 'domains');
        $this->updateBrowser($object, $fields, 'applicationForms');
        $this->updateBrowser($object, $fields, 'evaluators');

        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        if (!isset($fields['browsers'])) {
            $fields['browsers'] = [];
        }

        $fields['browsers']['financers'] = $this->getFormFieldsForBrowser(
            $object,
            'financers',
            null,
            'title',
            'partners'
        );

        $fields['browsers']['developers'] = $this->getFormFieldsForBrowser(
            $object,
            'developers',
            null,
            'title',
            'partners'
        );

        $fields['browsers']['implementers'] = $this->getFormFieldsForBrowser(
            $object,
            'implementers',
            null,
            'title',
            'partners'
        );

        $fields['browsers']['domains'] = $this->getFormFieldsForBrowser(
            $object,
            'domains',
            'solutions'
        );

        $fields['browsers']['applicationForms'] = $this->getFormFieldsForBrowser(
            $object,
            'applicationForms',
            'applications'
        );

        $fields['browsers']['evaluators'] = $this->getFormFieldsForBrowser(
            $object,
            'evaluators',
            'applications',
            'name',
            'dashboardUsers'
        );

        if ($fields['repositories']) {
            foreach ($fields['repositories'] as $key => $value) {
                $fields["repository_{$key}"] = $value;
            }
        }

        return $fields;
    }
}
