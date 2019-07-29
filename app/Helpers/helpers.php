<?php

use A17\Twill\Models\Feature;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Relations\Relation;
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
    $bucketables = collect(config("twill.buckets.navigation.buckets.${bucketKey}.bucketables"))
        ->pluck('module');

    return Feature::where('bucket_key', $bucketKey)->get()->filter(function ($feature) use ($bucketables, $bucketKey) {
        return $bucketables->contains($feature->featured_type);
    })->map(function ($feature) {
        return [
            'title' => $feature->featured->title,
            'url'   => Localization::getLocalizedURL(null, $feature->featured->slug),
        ];
    });
}
