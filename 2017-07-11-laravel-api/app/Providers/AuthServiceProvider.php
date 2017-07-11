<?php

namespace App\Providers;

use Dingo\Api\Auth\Provider\JWT;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Dingo\Api\Auth\Auth;
use Tymon\JWTAuth\JWTAuth;



class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];



	/**
	 * Register any authentication / authorization services.
	 *
	 * @return void
	 * @throws \InvalidArgumentException
	 */
    public function boot()
    {
        $this->registerPolicies();

	    app(Auth::class)->extend('jwt', function ($app) {
		    return new JWT($app[JWTAuth::class]);
	    });
    }
}
