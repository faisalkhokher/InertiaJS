<?php

namespace App\Repositiries;

use GrahamCampbell\ResultType\Success;

class PaymentRepository
{

    private $key;
    private $discount;
    public function __construct($key)
    {
        $this->key = $key;
        $this->discount = 0;
    }

    public function setDiscount($amount)
    {
        $this->discount = $amount;
    }

    public function charge($amount)
    {
        return [
            'amount' => $amount - $this->discount,
            'discount' => $this->discount,
        ];
    }

}
