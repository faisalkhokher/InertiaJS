<?php

namespace App\Facade;

use App\Services\TestService;
use Illuminate\Support\Facades\Facade;

class MyFacade extends Facade
{
    // public sa $str;
    // public static function __callStatic($name, $arguments){
    //     new TestService($arguments[0]);
    // }

    function __construct($va){
        new TestService($va);
    }

    // public static function setValue($value)
    // {
    //     $instance = new TestService($value);
    // }

    public static function callConstructor($a)
    {
        $instance = new TestService($a);
    }

    // protected static function getFacadeAccessor()
    // {
    //     return TestService::class;
    // }

}
