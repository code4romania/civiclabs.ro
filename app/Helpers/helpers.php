<?php

use Carbon\Carbon;
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
