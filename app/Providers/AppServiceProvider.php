<?php

namespace App\Providers;

use App\Repositiries\Interfaces\UserInterface;
use App\Repositiries\PaymentRepository;
use App\Repositiries\UserRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
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
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        $this->app->singleton(PaymentRepository::class , function ($value){
            return new PaymentRepository("6969");
        });
    }
}
