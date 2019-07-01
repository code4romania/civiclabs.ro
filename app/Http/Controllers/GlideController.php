<?php

namespace App\Http\Controllers;

// use Illuminate\Contracts\Filesystem\Filesystem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use League\Glide\Responses\LaravelResponseFactory;
use League\Glide\ServerFactory;
use League\Glide\Signatures\SignatureException;
use League\Glide\Signatures\SignatureFactory;

class GlideController extends Controller
{
    /**
     * @var \League\Glide\ServerFactory
     */
    private $server;

    /**
     * @var \Illuminate\Support\Facades\Storage
     */
    private $sourceDisk;

    /**
     * @var \Illuminate\Support\Facades\Storage
     */
    private $cacheDisk;

    /**
     *
     */
    private $attributes;

    /**
     * GlideController constructor.
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->sourceDisk = Storage::disk(config('glide.source'));
        $this->cacheDisk  = Storage::disk(config('glide.cache'));

        $this->server = $this->server($request);
        $this->request = $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  Filesystem $filesystem
     * @param  int        $id
     * @return \Illuminate\Http\Response
     */
    public function show($path)
    {
        $this->attributes = $this->request->except('no-cache');

        $this->validateSignature();

        if (!$this->sourceDisk->exists($path)) {
            abort(404);
        }

        return $this->server->getImageResponse($path, request()->all());
    }

    private function server(Request $request)
    {
        // Set source filesystem
        $source = $this->sourceDisk->getDriver();

        // Set cache filesystem
        $cache =  $this->cacheDisk->getDriver();

        // Setup Glide server
        return ServerFactory::create([
            'response'       => new LaravelResponseFactory($request),
            'driver'         => config('glide.driver'),
            'max_image_size' => config('glider.max_image_size'),
            'source'         => $source,
            'source_prefix'  => config('glide.source_prefix'),
            'cache'          => $cache,
            'cache_prefix'   => config('glide.cache_prefix'),
        ]);
    }

    /**
     * Validate the signature, if applicable
     *
     * @return void
     */
    public function validateSignature()
    {
        $key = config('app.key');

        // If secure images aren't enabled, don't bother validating the signature.
        if (!config('glide.use_signed_urls')) {
            return;
        }

        try {
            SignatureFactory::create(config('app.key'))->validateRequest($this->request->path(), $this->attributes);
        } catch (SignatureException $e) {
            abort(400, $e->getMessage());
        }
    }
}
