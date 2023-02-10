<?php

namespace App\Providers;

use App\Services\TestService;
use App\Repositiries\UserRepository;
use App\Repositiries\PaymentRepository;
use Illuminate\Support\ServiceProvider;
use App\Repositiries\Interfaces\UserInterface;

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
