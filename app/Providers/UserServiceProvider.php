<?php

namespace App\Providers;

use App\Repositiries\Interfaces\UserInterface;
use App\Repositiries\UserRepository;
use Illuminate\Support\ServiceProvider;

class UserServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app->bind(UserInterface::class , function ($value){
           return new UserRepository("6969");
        });

        // Todo : -- Dependency Injection -- Pass value in class constructor params.
        // Todo : if we have any constuctor in class during dependency then we bind that class and pass given value into that class params like this
        $this->app->bind(UserRepository::class , function ($value){
            return new UserRepository('4747');
        });

    }
}
