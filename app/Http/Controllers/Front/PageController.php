<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use SEO;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $frontPage = Page::findOrFail($this->getStoredValue('frontPage', 'site'));

        $this->setSeo([
            'description' => $frontPage->description,
        ]);

        return view('site.pages.index', [
            'item'          => $frontPage,
            'alternateUrls' => $this->getAlternateLocaleUrls('pages.index'),
        ]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Page  $page
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Page::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->description,
        ]);

        return view('site.pages.show', [
            'item'          => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('pages.show', $item),
        ]);
    }
}
