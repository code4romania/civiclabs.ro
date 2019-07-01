<?php

function getLanguageLabelFromLocaleCode($code)
{
    return config('translatable.languages')[$code] ?? $code;
}


function getTranslatedDayNamesJson()
{
    return collect(['Su', 'M', 'Tu', 'W', 'Th', 'F', 'S'])
        ->map(function($name) {
            return __("date.day.{$name}");
        })->toJson();
}

function getTranslatedMonthNamesJson()
{
    return collect(['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'])
        ->map(function($name) {
            return __("date.month.{$name}");
        })->toJson();
}
