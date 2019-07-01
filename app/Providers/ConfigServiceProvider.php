<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ConfigServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->localization();
    }

    public function localization()
    {
        $localization = [
            'useAcceptLanguageHeader' => false,
            'hideDefaultLocaleInURL' => false,
            'supportedLocales' => [],
            'localesOrder' => config('translatable.locales'),
        ];

        foreach (config('translatable.languages') as $locale => $name) {
            if (in_array($locale, config('translatable.disabled'))) {
                continue;
            }

            $localization['supportedLocales'][$locale] = [
                'script' => 'Latn',
                'native' => $name,
                'name'   => $name,
            ];

            $localization['localesMapping'] = [];
        }


        return config([
            'laravellocalization' => $localization,
        ]);
    }
}
