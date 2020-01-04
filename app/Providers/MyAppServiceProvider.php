<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Extension\PaymentGateWay;
class MyAppServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(

            'App\Repository\RoomInterface',
            'App\Repository\RoomRepository'
        );

        $this->app->bind(

           'App\Repository\BookingInterface',
           'App\Repository\BookingRepository'
        );

        $this->app->singleton(PaymentGateWay::class,function($app){
            return  new PaymentGateWay();
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
