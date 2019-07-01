<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;
use Illuminate\Contracts\Foundation\Application;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * The URIs that should be reachable while maintenance mode is enabled.
     *
     * @var array
     */
    protected $except = [];

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Application $app)
    {
        parent::__construct($app);

        $appUrl    = config('app.url');
        $adminUrl  = config('twill.admin_app_url');
        $adminPath = config('twill.admin_app_path');

        if ($appUrl === $adminUrl) {
            $this->except = [
                sprintf('%s*', $adminPath),
            ];
        } else {
            $this->except = [
                sprintf('*%s*', $adminUrl),
            ];
        }
    }
}
