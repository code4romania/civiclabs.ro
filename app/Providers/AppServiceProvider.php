<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\ServiceProvider;
use Localization;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->requireHelpers();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Relation::morphMap([
            'applicationForm' => 'App\Models\ApplicationForm',
            'byproduct'       => 'App\Models\Byproduct',
            'domain'          => 'App\Models\Domain',
            'page'            => 'App\Models\Page',
            'partner'         => 'App\Models\Partner',
            'financer'        => 'App\Models\Partner',
            'implementer'     => 'App\Models\Partner',
            'person'          => 'App\Models\Person',
            'post'            => 'App\Models\Post',
            'solution'        => 'App\Models\Solution',
        ]);

        $this->setProperLocale();
    }

    private function requireHelpers()
    {
        $helpers = [
            'application_form_helpers.php',
            'routes_helpers.php',
            'i18n_helpers.php',
            'media_library_helpers.php',
            'frontend_helpers.php',
            'migrations_helpers.php',
            'helpers.php',
        ];

        foreach ($helpers as $helper) {
            $path = app_path('Helpers/'. $helper);

            if (file_exists($path)) {
                require_once($path);
            }
        }
    }

    private function setProperLocale()
    {
        $locale = Localization::setLocale();

        Carbon::setLocale($locale);
        setlocale(LC_TIME, config("translatable.languageCodes.${locale}"));
    }
}
