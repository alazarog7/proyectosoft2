<?php

namespace App\Providers;

use App\Library\RSACrypt;
use Illuminate\Support\ServiceProvider;

class RsaEncDecProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('App\Library\RSACrypt',function($app){
            return new RSACrypt();
        });
    }
}
