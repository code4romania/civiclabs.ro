<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Byproduct;
use Illuminate\Http\Request;
use SEO;

class ByproductController extends Controller
{

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Byproduct  $item
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $item = Byproduct::forSlug($slug)
            ->publishedInListings()
            ->withActiveTranslations()
            ->firstOrFail();

        if (!$item->standalone_page) {
            abort(404);
        }

        $this->setSeo([
            'title'       => $item->title,
            'description' => $item->description,
        ]);

        return view('site.byproducts.show', [
            'item'          => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('byproducts.show', $item),
        ]);
    }
}
