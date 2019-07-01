<?php

namespace App\Repositories;

use A17\Twill\Repositories\Behaviors\HandleBlocks;
use A17\Twill\Repositories\Behaviors\HandleFiles;
use A17\Twill\Repositories\Behaviors\HandleMedias;
use A17\Twill\Repositories\Behaviors\HandleRevisions;
use A17\Twill\Repositories\Behaviors\HandleSlugs;
use A17\Twill\Repositories\Behaviors\HandleTranslations;
use A17\Twill\Repositories\ModuleRepository;
use App\Models\Domain;
use Illuminate\Support\Facades\DB;

class DomainRepository extends ModuleRepository
{
    use HandleBlocks, HandleTranslations, HandleSlugs, HandleMedias, HandleFiles, HandleRevisions;

    public function __construct(Domain $model)
    {
        $this->model = $model;
    }

    public function afterSave($object, $fields)
    {
        $this->updateBrowser($object, $fields, 'financers');
        $this->updateBrowser($object, $fields, 'subdomains');
        $this->updateBrowser($object, $fields, 'solutions');
        parent::afterSave($object, $fields);
    }

    public function getFormFields($object)
    {
        $fields = parent::getFormFields($object);

        if (!isset($fields['browsers'])) {
            $fields['browsers'] = [];
        }

        $fields['browsers']['financers'] = $this->getFormFieldsForBrowser($object, 'financers', null, 'title', 'partners');
        $fields['browsers']['subdomains'] = $this->getFormFieldsForBrowser($object, 'domains', 'solutions');
        $fields['browsers']['solutions'] = $this->getFormFieldsForBrowser($object, 'solutions', 'solutions');

        return $fields;
    }
}
