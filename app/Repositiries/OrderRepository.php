<?php

namespace App\Repositiries;

class OrderRepository
{
    private $paymentRepository;
    public function __construct(PaymentRepository $paymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
    }

    public function all()
    {
        $this->paymentRepository->setDiscount(500);

        return [
            'Payment' => "Success",
        ];
    }
}
