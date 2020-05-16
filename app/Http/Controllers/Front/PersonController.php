<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Person;
use Illuminate\Http\Request;

class PersonController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Person::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

        $this->setSeo([
            'title'       => $item->name,
            'description' => $item->description,
            'image'       => $item->image('image', 'default', [
                'w'   => max(config('twill.breakpoints')),
                'fit' => 'max',
            ]),
        ]);

        return view('site.people.show', [
            'item'  => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('team.show', $item),
        ]);
    }
}
