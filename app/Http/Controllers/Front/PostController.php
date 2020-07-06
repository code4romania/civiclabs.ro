<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $header = [
            'title'       => $this->getStoredValue('blogTitle', 'site'),
            'description' => $this->getStoredValue('blogDescription', 'site'),
        ];

        $this->setSeo($header);

        return view('site.posts.index', [
            'items'         => Post::publishedInListings()->orderByDesc('publish_start_date')->get(),
            'alternateUrls' => $this->getAlternateLocaleUrls('blog.index'),
            'header'        => $header,
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

        $item = Post::forSlug($slug)
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

        return view('site.posts.show', [
            'item'          => $item,
            'alternateUrls' => $this->getAlternateLocaleUrls('blog.show', $item),
        ]);
    }
}
