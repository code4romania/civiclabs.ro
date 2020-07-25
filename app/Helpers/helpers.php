<?php

use A17\Twill\Models\Feature;
use Illuminate\Support\Facades\Cache;
use Leewillis77\CachedEmbed\CachedEmbed;

function getEmbedForUrl($url)
{
    try {
        return CachedEmbed::create($url, config('embeds'));
    } catch (Exception $e) {
        return null;
    }
}

function sum($a, $b)
{
    return $a + $b;
}

function mapTableColumns($options, $name)
{
    $column = [
        'field' => $name,
        'label' => __("dashboard.table.{$name}"),
    ];

    foreach ($options as $key => $value) {
        $column[$key] = $value;
    }

    return $column;
}

function getFeaturedMenuItems($bucketKey)
{
    return Cache::remember("menu-items-{$bucketKey}", now()->addMinutes(5), function () use ($bucketKey) {
        $bucketables = collect(config("twill.buckets.navigation.buckets.${bucketKey}.bucketables"))
            ->pluck('module');

        return Feature::with([
            'featured',
            'featured.slugs',
        ])
            ->where('bucket_key', $bucketKey)
            ->whereIn('featured_type', $bucketables)
            ->get()
            ->map(function ($feature) {
                return [
                    'title' => $feature->featured->title,
                    'url'   => Localization::getLocalizedURL(null, $feature->featured->slug),
                ];
            });
    });
}
