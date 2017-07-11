<?php

namespace App\Providers;

use Dingo\Api\Routing\Router;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Symfony\Component\Finder\Finder;



class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();
    }


    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
	    $api = app(Router::class);

	    $api->version('v1', function ($api) {
		    $api->group([
			    'namespace'  => $this->namespace,
			    'middleware' => 'api',
		    ], function ($api) {
			    foreach (Finder::create()->files()->in(base_path('routes/api')) as $file) {
				    require $file->getPathname();
			    }
		    });
	    });
    }
}
