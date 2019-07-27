<?php

namespace App\Observers;

use A17\Twill\Models\Feature;
use Illuminate\Database\Eloquent\Relations\Relation;

class FeatureObserver
{
    /**
     * Handle the feature "creating" event.
     *
     * @param  \A17\Twill\Models\Feature  $feature
     * @return void
     */
    public function creating(Feature $feature)
    {
        if (is_null(Relation::getMorphedModel($feature->featured_type))) {
            return false;
        }
    }
}
