<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Domain;
use Illuminate\Http\Request;

class DomainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->setSeo([
            'title'       => $this->getStoredValue('domainsTitle', 'site'),
            'description' => $this->getStoredValue('domainsDescription', 'site'),
        ]);

        return view('site.domains.index', [
            'items'         => Domain::publishedInListings()
                ->withActiveTranslations()
                ->ordered()
                ->get(),
            'alternateUrls' => $this->getAlternateLocaleUrls('domains.index'),
            'header'        => [
                'title'       => $this->getStoredValue('domainsTitle', 'site'),
                'description' => $this->getStoredValue('domainsDescription', 'site'),
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Domain::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->description,
            'image'       => $item->image('image', 'default', [
                'w'   => max(config('twill.breakpoints')),
                'fit' => 'max',
            ]),
        ]);

        return view('site.domains.show', [
            'item'          => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('domains.show', $item),
        ]);
    }
}
