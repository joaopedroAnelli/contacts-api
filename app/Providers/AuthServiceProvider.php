<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Boot the authentication services for the application.
     *
     * @return void
     */
    public function boot()
    {
        // Here you may define how you wish users to be authenticated for your Lumen
        // application. The callback which receives the incoming request instance
        // should return either a User instance or null. You're free to obtain
        // the User instance via an API token or any other method necessary.

        /**
         * @param Request $request
         * @return Builder|Model|object|null
         */
        $getUserByRequest = function (Request $request) {
            return User
                ::query()
                ->where([
                    'api_token' => $request->bearerToken()
                ])->first();
        };

        $this->app['auth']->viaRequest('api', $getUserByRequest);
    }
}
