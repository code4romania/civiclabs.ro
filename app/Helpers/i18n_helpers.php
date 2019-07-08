<?php

function getLanguageLabelFromLocaleCode($code)
{
    return config('translatable.languages')[$code] ?? $code;
}


function getTranslatedDayNamesJson()
{
    $dayNames = [
        'Su',
        'M',
        'Tu',
        'W',
        'Th',
        'F',
        'S',
    ];

    return collect($dayNames)->map(function ($name) {
        return __("date.day.{$name}");
    })->toJson();
}

function getTranslatedMonthNamesJson()
{
    $monthNames = [
        'January',
        'February',
        'March',
        'April',
        'May',
        'June',
        'July',
        'August',
        'September',
        'October',
        'November',
        'December',
    ];

    return collect($monthNames)->map(function ($name) {
        return __("date.month.{$name}");
    })->toJson();
}
