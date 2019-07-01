<?php

namespace App\Http\Controllers;

use A17\Twill\Http\Controllers\Front\Controller as TwillController;
use A17\Twill\Models\Feature;
use A17\Twill\Repositories\SettingRepository;
use Illuminate\Contracts\Routing\route;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Localization;
use SEO;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getStoredValue($key, $section = null)
    {
        return app(SettingRepository::class)->byKey($key, $section);
    }

    public function getAlternateLocaleUrls($routeName, $item = null)
    {
        $alternateUrls = [];

        foreach (config('translatable.locales') as $locale) {
            if (in_array($locale, config('translatable.disabled'))) {
                continue;
            }

            if (app()->getLocale() === $locale) {
                continue;
            }

            if (!is_null($item)) {
                if ($item->hasActiveTranslation($locale)) {
                    $alternateUrls[$locale] = Localization::getLocalizedURL($locale, route($routeName, [
                        'slug' => $item->getSlug($locale),
                    ]));
                }
            } else {
                $alternateUrls[$locale] = Localization::getLocalizedURL($locale, route($routeName));
            }
        }

        return $alternateUrls;
    }

    public function setSeo($params = [])
    {
        $defaults = [
            'title'       => '',
            'description' => '',
            'image'       => '',
        ];

        $params = array_merge($defaults, $params);

        if (!empty($params['title'])) {
            SEO::setTitle($params['title']);
        }

        $description = strip_tags($params['description']);
        if (!empty($description)) {
            SEO::setDescription($description);
        }

        if (!empty($params['image'])) {
            SEO::opengraph()->addImage($params['image']);
        }
    }
}
