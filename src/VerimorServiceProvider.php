<?php

namespace UmutTaymaz\VerimorSMSAPI;

use Illuminate\Support\ServiceProvider;

class VerimorServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap Verimor services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register Verimor services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('Verimor', function (){
            return new Verimor();
        });
    }
}
