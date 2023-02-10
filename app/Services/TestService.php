<?php

namespace App\Services;

class TestService
{
    public $value;
    public function __construct($value)
    {
        $this->value = $value;
        
    } 

    public function __destruct()
    {
        dd("DIST - ".$this->value);
    }
}
